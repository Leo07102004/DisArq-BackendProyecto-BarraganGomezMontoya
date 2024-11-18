describe('Página principal - DeTodoUnPoco', () => {
    it('Verifica que los botones redirigen correctamente', () => {
      cy.visit('https://leo07102004.github.io/DisArq-FrontendProyecto-BarraganGomezMontoya/');
      
      // Verifica el botón de Iniciar Sesión
      cy.contains('Iniciar Sesión').click();
      cy.url().should('include', '/login'); // Asegúrate de que redirige al login
  
      // Regresa a la página inicial
      cy.go('back');
  
      // Verifica el botón de Registrarse
      cy.contains('Registrarse').click();
      cy.url().should('include', '/register'); // Asegúrate de que redirige al registro
    });
  });
  