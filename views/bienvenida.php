<div class="container">
        <div class="tabs">
            <div class="tab active" onclick="showForm('login')">Iniciar Sesión</div>
            <div class="tab" onclick="showForm('signup')">Crear Cuenta</div>
        </div>
        
        <div id="login-form" class="form-container active">
            <input type="email" placeholder="Correo electrónico" required>
            <input type="password" placeholder="Contraseña" required>
            <div class="forgot-password">
                <a href="#">¿Olvidaste tu contraseña?</a>
            </div>
            <button type="submit">Iniciar Sesión</button>
        </div>
        
        <div id="signup-form" class="form-container">
            <input type="text" placeholder="Nombre completo">
            <input type="email" placeholder="Correo electrónico">
            <input type="password" placeholder="Contraseña">
            <input type="password" placeholder="Confirmar contraseña">
            <button type="submit">Registrarse</button>
        </div>
    </div>