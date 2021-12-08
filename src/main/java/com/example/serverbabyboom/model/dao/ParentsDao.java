package com.example.serverbabyboom.model.dao;

import com.example.serverbabyboom.model.ParentsBean;
import org.springframework.data.jpa.repository.JpaRepository;
import org.springframework.stereotype.Repository;

import java.util.List;

@Repository
public interface ParentsDao extends JpaRepository<ParentsBean, Long> {

    List<ParentsBean> findByEmail(String login);
}
