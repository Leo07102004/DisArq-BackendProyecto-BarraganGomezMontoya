describe('Auth API Endpoints', () => {
    it('should register a new user successfully', () => {
        cy.request({
            method: 'POST',
            url: '/api/register',
            body: {
                name: 'Test Usersito',
                email: 'testusersito@example.com',
                password: 'password',
                password_confirmation: 'password'
            }
        }).then((response) => {
            expect(response.status).to.eq(201);
            expect(response.body).to.have.property('mensaje', 'Usuario registrado con éxito');
            expect(response.body).to.have.property('token');
        });
    });
});
