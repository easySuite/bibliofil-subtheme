/// <reference types="cypress" />

describe('Accessibility tests.', () => {

  it('Should have no accessibility violations for Global Code lang and viewport. ', () => {
    cy.visit("/");
    cy.get('html').should('have.attr', 'lang').should('not.be.empty')

    cy.get('meta[property="og:site_name"]').should('have.attr', 'content').should('not.be.empty')

    cy.get('meta[property="og:type"]').should('have.attr', 'content').should('not.be.empty')

    cy.get('meta[property="og:url"]').should('have.attr', 'content').should('not.be.empty')

    cy.get('meta[property="og:title"]').should('have.attr', 'content').should('not.be.empty')

    cy.get('meta[name="viewport"]').should('have.attr', 'content').should('not.be.empty')

  })
  
  it('Should have no accessibility violations for img, button, input, title and a tags.', () => {
    cy.visit("/");

    cy.get('a').should('have.attr', 'href')

    cy.get('img').should('have.attr', 'alt').should('not.be.empty')

    cy.get('img').should('have.attr', 'src').should('not.be.empty')
  
    cy.get('button').should('have.attr', 'type').should('not.be.empty')

    cy.get('button').should('be.visible')

    cy.get('input').should('have.attr', 'aria-label').should('not.be.empty')

    cy.get('title').should('not.be.empty')

    cy.get('#main-content').should('have.attr', 'role').should('eq', 'main')

  
    cy.get('input').and(($input) => {
      expect($input).have.attr('type').not.empty
      expect($input).have.attr('title').not.empty
    })
  })
  
  it('Should have no accessibility violations on front page.', () => {
    cy.visit("/");
    cy.wait(3000)
    cy.injectAxe()
    cy.checkA11y(null, {
      includedImpacts: ['critical','serious']

    })
  })

  it('Should have no accessibility violations on arrangementer page.', () => {
    cy.visit("/arrangementer");

    cy.injectAxe()

    cy.checkA11y(null, 
      {
        exclude: ['.secondary-content'],
        includedImpacts: ['critical','serious'],
        rules: {
          'aria-allowed-attr': { enabled: false },
        },
      },
    );
  })

  it('Should have no accessibility violations on biblioteker page.', () => {
    cy.visit("/biblioteker");

    cy.injectAxe()

    cy.checkA11y(null, {
      includedImpacts: ['critical','serious']

    })
  })

  it('Should have no accessibility violations on nyheder page.', () => {
    cy.visit("/nyheder");

    cy.injectAxe()

    cy.checkA11y(null, {
      includedImpacts: ['critical','serious']

    })
  })

  it('Should have no accessibility violations on e-materialer page.', () => {
    cy.visit("/e-materialer");

    cy.injectAxe()

    cy.checkA11y(null, {
      includedImpacts: ['critical','serious']

    })
  })
})
