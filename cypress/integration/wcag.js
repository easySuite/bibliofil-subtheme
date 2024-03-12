/// <reference types="cypress" />

describe('Accessibility tests.', () => {

  it('Should have no accessibility violations for Global Code lang and viewport. ', () => {

    cy.visit("/",{ timeout: 30000 })

    cy.get('html').should('have.attr', 'lang').should('not.be.empty')

    cy.get('meta[property="og:site_name"]').should('have.attr', 'content').should('not.be.empty')

    cy.get('meta[property="og:type"]').should('have.attr', 'content').should('not.be.empty')

    cy.get('meta[property="og:url"]').should('have.attr', 'content').should('not.be.empty')

    cy.get('meta[property="og:title"]').should('have.attr', 'content').should('not.be.empty')

    cy.get('meta[name="viewport"]').should('have.attr', 'content').should('not.be.empty')

  })

  it('Should use semantic HTML elements', () => {
    // Visit your web page or application
    cy.visit("/");

    // Check the presence of semantic elements
    cy.get('header').should('exist');
    cy.get('nav').should('exist');
    cy.get('section').should('exist');
    cy.get('footer').should('exist');

    // Check heading elements within the appropriate sections
    cy.get('footer h2').should('exist');

    // Check the use of lists
    cy.get('ul').should('exist');

    // Check the presence of form elements
    cy.get('form').should('exist');
    cy.get('label').should('exist');
    cy.get('input').should('exist');
    cy.get('button').should('exist');
  });

  it('Should have no accessibility violations for img, button, input, title and a tags.', () => {
    cy.visit("/",{ timeout: 30000 })

    cy.get('a').should('have.attr', 'href').should('not.be.empty')

    cy.get('img').should('have.attr', 'alt').should('not.be.empty')

    cy.get('img').should('have.attr', 'src').should('not.be.empty')
  
    cy.get('button').should('have.attr', 'type').should('not.be.empty')

    cy.get('button').should('be.visible')

    cy.get('input[type="text"]').should('have.attr', 'aria-label', 'Søgefelt');

    cy.get('title').should('not.be.empty')

    cy.get('#main-content').should('have.attr', 'role').should('eq', 'main')

  
    cy.get('input').and(($input) => {
      expect($input).have.attr('type').not.empty
      
    })
  })

  it('Accessible Forms Testing. Should have accessible form elements', () => {
    cy.visit("/",{ timeout: 30000 })
    // Check form labels and input fields
    cy.get('form').within(() => {
      cy.get('label').each((label) => {
        const inputId = label.attr('for');
        expect(inputId).to.exist;

        const input = cy.get(`#${inputId}`);
        input.should('exist');
        //input.should('have.attr', 'type', label.attr('id'));
      });

      // Check for accessible error messages
     // cy.get('.error-message').should('have.attr', 'type', 'text');
     // cy.get('.error-message').should('have.attr', 'aria-live', 'assertive');
    });
  });

  it('Image Accessibility Testing. Should provide alternative text for images', () => {
    // Visit your web page or application
    cy.visit("/");

    // Check all images for the presence of alt attributes
    cy.get('img').each((image) => {
      const altText = image.attr('alt');

      // Check if alt attribute is present and not empty
      expect(altText).to.exist;
      expect(altText).not.to.be.empty;

      // Optionally, check for specific alt text content or patterns
      // Example: Check that alt text is not a placeholder like "image123"
      expect(altText.toLowerCase()).not.to.contain('image');
    });

    // Perform additional checks based on your application's image usage

    // Example: Check specific images with custom attributes
    cy.get('img').each((image) => {
      const altText = image.attr('alt');

      // Check if alt attribute is present and not empty
      expect(altText).to.exist;
      expect(altText).not.to.be.empty;
    });
  });

  it('Should have focus management for form interactions', () => {
    cy.visit("/",{ timeout: 30000 })
    // Check focus when interacting with form elements
    cy.get('form').within(() => {
      // Simulate tabbing through form elements
     // cy.tabThroughFormFields();

      // Optionally check for specific focus behaviors based on your application
      cy.get("input[title='Søgefelt']").click()
      .should('be.focused');

      cy.get("input[title='Søgefelt']").type('harry')
      .should('be.focused');
    });
  });
  
  it('Should have no accessibility violations on front page.', () => {
    cy.visit("/",{ timeout: 30000 })

    cy.injectAxe()
     .wait(1000)

    cy.checkA11y(null, {
      includedImpacts: ['critical','serious'],
      rules: {
        'aria-required-children': { enabled: false }
      },
    })
  })

  it('Should have no accessibility violations on arrangementer page.', () => {
    cy.visit("/arrangementer",{ timeout: 30000 })

    cy.get('title').should('not.be.empty')

    cy.injectAxe()
    .wait(3000)

  cy.checkA11y(null,
    {
      includedImpacts: ['critical','serious'],
      rules: {
        'aria-allowed-attr': { enabled: false }
      },
    },
  );
  })

  it('Should have no accessibility violations on biblioteker page.', () => {
  cy.visit("/biblioteker",{ timeout: 30000 })

  cy.get('title').should('not.be.empty')

  cy.injectAxe()
    .wait(3000)

    cy.checkA11y(null, {
      includedImpacts: ['critical','serious']

    })
  })

  it('Should have no accessibility violations on nyheder page.', () => {
    cy.visit("/nyheder",{ timeout: 30000 })

    cy.get('title').should('not.be.empty')

    cy.injectAxe()
      .wait(3000)

    cy.checkA11y(null, {
      includedImpacts: ['critical','serious']

    })
  })

  it('Should have no accessibility violations on e-materialer page.', () => {
    cy.visit("/e-materialer",{ timeout: 30000 })

    cy.get('title').should('not.be.empty')

    cy.injectAxe()
      .wait(3000)

    cy.checkA11y(null, {
      includedImpacts: ['critical','serious']

    })
  })
})
