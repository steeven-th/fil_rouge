package com.sthomas.dev.babyboom.bean;

public class ResultBean {

    private GeometryBean geometry;
    private String name;
    private String place_id;

    public ResultBean(GeometryBean geometry, String name, String place_id) {
        this.geometry = geometry;
        this.name = name;
        this.place_id = place_id;
    }


    /*----------------------*/
    // Getter & Setter
    /*----------------------*/

    public GeometryBean getGeometry() {
        return geometry;
    }

    public String getName() {
        return name;
    }

    public void setName(String name) {
        this.name = name;
    }

    public String getPlace_id() {
        return place_id;
    }
}
