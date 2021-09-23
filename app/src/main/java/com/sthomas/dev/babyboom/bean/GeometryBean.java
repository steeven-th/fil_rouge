package com.sthomas.dev.babyboom.bean;

public class GeometryBean {

    private LocationBean location;

    public GeometryBean(LocationBean location) {
        this.location = location;
    }


    /*----------------------*/
    // Getter & Setter
    /*----------------------*/

    public LocationBean getLocation() {
        return location;
    }
}
