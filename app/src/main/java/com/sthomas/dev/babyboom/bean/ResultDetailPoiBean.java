package com.sthomas.dev.babyboom.bean;

public class ResultDetailPoiBean {

    private String formatted_address;
    private String formatted_phone_number;
    private String name;
    private float rating;
    private String url;

    public ResultDetailPoiBean(String formatted_address, String formatted_phone_number, String name, float rating, String url) {
        this.formatted_address = formatted_address;
        this.formatted_phone_number = formatted_phone_number;
        this.name = name;
        this.rating = rating;
        this.url = url;
    }


    /*----------------------*/
    // Getter & Setter
    /*----------------------*/

    public String getFormatted_address() {
        return formatted_address;
    }

    public String getFormatted_phone_number() {
        return formatted_phone_number;
    }

    public String getName() {
        return name;
    }

    public String getRating() {
        return rating + "";
    }

    public String getUrl() {
        return url;
    }
}
