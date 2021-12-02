package com.sthomas.dev.babyboom.bean;

public class ParentsBean {

    private String parent1Name;
    private String parent2Name;
    private String tel;
    private String email;
    private int postalCode;
    private String shareCode;
    private String login;
    private String password;

    public ParentsBean() {
    }

    public ParentsBean(String email, String password) {

        this.email = email;
        this.password = password;
    }

    @Override
    public String toString() {
        return "ParentsBean{" +
                ", parent1Name='" + parent1Name + '\'' +
                ", parent2Name='" + parent2Name + '\'' +
                ", tel='" + tel + '\'' +
                ", email='" + email + '\'' +
                ", postalCode=" + postalCode +
                ", shareCode='" + shareCode + '\'' +
                ", login='" + login + '\'' +
                ", password='" + password + '\'' +
                '}';
    }

    /*----------------------*/
    // Getter & Setter
    /*----------------------*/

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

    public int getPostalCode() {
        return postalCode;
    }

    public void setPostalCode(int postalCode) {
        this.postalCode = postalCode;
    }

    public String getShareCode() {
        return shareCode;
    }

    public void setShareCode(String shareCode) {
        this.shareCode = shareCode;
    }

    public String getLogin() {
        return login;
    }

    public void setLogin(String login) {
        this.login = login;
    }

    public String getPassword() {
        return password;
    }

    public void setPassword(String password) {
        this.password = password;
    }
}
