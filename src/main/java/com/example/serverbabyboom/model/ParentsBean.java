package com.example.serverbabyboom.model;

import javax.persistence.*;

@Entity
@Table(name = "parents")
public class ParentsBean {

    @Id
    @GeneratedValue(strategy = GenerationType.IDENTITY)
    private Long idParent;
    private String parent1Name;
    private String parent2Name;
    private String tel;
    private String email;
    private String postalCode;
    private String shareCode;
    private String password;
    private boolean isActive;
    private boolean isVerified;
    private String roles;
    private long idRole;

    public ParentsBean() {
    }

    public ParentsBean(Long idParent, String email, String password) {

        this.idParent = idParent;
        this.email = email;
        this.password = password;

        /* VARIABLES POUR L'ACCES AU SITEWEB SYMFONY */
        this.isActive = true;
        this.isVerified = true;
        this.roles = "[\"ROLE_USER\"]";

        /* Role par défaut des nouveaux utilisateurs */
        this.idRole = 2;
    }

    //Surcharge de la méthode toString
    @Override
    public String toString() {
        return "ParentsBean{" +
                "idParent=" + idParent +
                ", parent1Name='" + parent1Name + '\'' +
                ", parent2Name='" + parent2Name + '\'' +
                ", tel='" + tel + '\'' +
                ", email='" + email + '\'' +
                ", postalCode=" + postalCode +
                ", shareCode='" + shareCode + '\'' +
                ", password='" + password + '\'' +
                ", idRole=" + idRole +
                '}';
    }

    /*----------------------*/
    // Getter & Setter
    /*----------------------*/

    public Long getIdParent() {
        return idParent;
    }

    public void setIdParent(Long idParent) {
        this.idParent = idParent;
    }

    public String getParent1Name() {
        return parent1Name;
    }

    public void setParent1Name(String parent1Name) {
        this.parent1Name = parent1Name;
    }

    public String getParent2Name() {
        return parent2Name;
    }

    public void setParent2Name(String parent2Name) {
        this.parent2Name = parent2Name;
    }

    public String getTel() {
        return tel;
    }

    public void setTel(String tel) {
        this.tel = tel;
    }

    public String getEmail() {
        return email;
    }

    public void setEmail(String email) {
        this.email = email;
    }

    public String getPostalCode() {
        return postalCode;
    }

    public void setPostalCode(String postalCode) {
        this.postalCode = postalCode;
    }

    public String getShareCode() {
        return shareCode;
    }

    public void setShareCode(String shareCode) {
        this.shareCode = shareCode;
    }

    public String getPassword() {
        return password;
    }

    public void setPassword(String password) {
        this.password = password;
    }

    public boolean isActive() {
        return isActive;
    }

    public void setActive(boolean active) {
        isActive = active;
    }

    public boolean isVerified() {
        return isVerified;
    }

    public void setVerified(boolean verified) {
        isVerified = verified;
    }

    public String getRoles() {
        return roles;
    }

    public void setRoles(String roles) {
        this.roles = roles;
    }

    public long getIdRole() {
        return idRole;
    }

    public void setIdRole(long idRole) {
        this.idRole = idRole;
    }
}
