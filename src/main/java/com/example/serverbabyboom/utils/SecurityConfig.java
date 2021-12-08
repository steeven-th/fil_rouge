package com.example.serverbabyboom.utils;

import org.springframework.context.annotation.Configuration;
import org.springframework.security.config.annotation.web.builders.WebSecurity;
import org.springframework.security.config.annotation.web.configuration.WebSecurityConfigurerAdapter;

//Surcharge de la configuration de Spring Security pour authoriser toutes les requêtes sans authentification
//Spring Security n'est utilisé que pour le hash du password utilisateur avec BCrypt
@Configuration
public class SecurityConfig extends
        WebSecurityConfigurerAdapter {
    @Override
    public void configure(WebSecurity web) throws Exception {
        web.ignoring().antMatchers("/**");
    }
}