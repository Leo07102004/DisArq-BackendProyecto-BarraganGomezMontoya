describe("Home Page Test", () => {
    it("should load the home page", () => {
      cy.visit("/");
      cy.contains("Laravel").should("be.visible"); // Cambia 'Laravel' por un texto que esperes ver en tu página
    });
  });
  