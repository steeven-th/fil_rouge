package com.example.serverbabyboom.ws;

import com.example.serverbabyboom.model.ParentsBean;
import com.example.serverbabyboom.model.dao.ParentsDao;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.security.crypto.bcrypt.BCrypt;
import org.springframework.web.bind.annotation.PostMapping;
import org.springframework.web.bind.annotation.RequestBody;
import org.springframework.web.bind.annotation.RestController;

import java.util.List;
import java.util.regex.Pattern;

@RestController
public class ParentsAPI {

    @Autowired
    private ParentsDao parentsDao;

    private List<ParentsBean> parentsBeanList;
    private final Pattern regex = Pattern.compile("^(?=.*[A-Z])(?=.*[a-z])(?=.*[0-9])(?=.*[^A-Za-z0-9]).{8,20}$");

    //http://localhost:8080/saveParents
    @PostMapping("/saveParents")
    public boolean saveParents(@RequestBody ParentsBean parentsBean) {
        System.out.println("/saveParents" + parentsBean.toString());

        //On vérifie si il y a bien un email, un password et que ce dernier suive le regex imposé
        if (parentsBean.getEmail().isEmpty() || parentsBean.getPassword().isEmpty() || !regex.matcher(parentsBean.getPassword()).find()) {

            return false;
        } else {

            //On vérifie en BDD si un utilisateur avec cet email existe
            parentsBeanList = parentsDao.findByEmail(parentsBean.getEmail());
        }

        //Si il n'existe pas, on enregistre l'utilisateur et on renvoi TRUE, sinon en renvoi FALSE
        if (parentsBeanList.isEmpty()) {

            //On hash le password avec la méthode BCrypt
            String pw_hash = BCrypt.hashpw(parentsBean.getPassword(), BCrypt.gensalt(13));

            ParentsBean parentsBeanRegister = new ParentsBean(0L, parentsBean.getEmail(), pw_hash);

            parentsDao.save(parentsBeanRegister);

            return true;
        } else {

            return false;
        }
    }

    //http://localhost:8080/loginParents
    @PostMapping("/loginParents")
    public boolean login(@RequestBody ParentsBean parentsBean) {

        System.out.println("/loginParents : " + parentsBean.toString());

        //On vérifie en BDD si un utilisateur avec cet email existe
        parentsBeanList = parentsDao.findByEmail(parentsBean.getEmail());

        //Si l'utilisateur n'existe pas, on retourne FALSE
        if (parentsBeanList.isEmpty()) {

            return false;
        } else {

            //On compare le mot de passe envoyé et le mot de passe enregistré en BDD
            //On retourne TRUE si la correspondance est bonne

            return BCrypt.checkpw(parentsBean.getPassword(), parentsBeanList.get(0).getPassword());
        }
    }
}
