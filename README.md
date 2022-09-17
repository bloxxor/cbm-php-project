# cbm-php-project
Project for PHPPR

---

## Stored Procedures

##### Insert:
Stored Procedure `insert_classified(title,description,image)`

```
create
    definer = root@localhost procedure insert_classified(
        IN p_title varchar(255), 
        IN p_description longtext, 
        IN p_image blob
    )
BEGIN
    INSERT INTO classifieds (title, description, image)
    VALUES (
        p_title,
        p_description,
        p_image
    );
END;
```

---
##### Update:
Stored Procedure `update_classified(title, description, image)`
```
create
    definer = root@localhost procedure update_classified(
        IN p_title varchar(255), 
        IN p_description longtext, 
        IN p_id int
    )
BEGIN
    UPDATE classifieds
    SET classifieds.title       = p_title,
        classifieds.description = p_description
    WHERE classifieds.id = p_id;
END;
```