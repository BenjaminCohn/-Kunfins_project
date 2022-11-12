DELIMITER $$ 
CREATE
    TRIGGER `new_user`
    AFTER INSERT
    ON `user` FOR EACH ROW
    BEGIN

DECLARE v_list int;
DECLARE v_each_list CURSOR 
    LOCAL STATIC READ_ONLY FORWARD_ONLY
FOR
    SELECT idList 
    FROM lister

SELECT COUNT(*) FROM lister INTO v_list;

foreach ()
INSERT INTO likes VALUES(DEFAULT,)