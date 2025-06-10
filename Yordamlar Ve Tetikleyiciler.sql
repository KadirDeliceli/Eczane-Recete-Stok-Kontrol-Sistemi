DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `ecz_doktorbul`( 
    pDoktorID Int
)
BEGIN
START TRANSACTION;
   SELECT * FROM doktorlar WHERE  DoktorID = pDoktorID;
COMMIT;
END$$
DELIMITER ;

DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `ecz_doktorekle`(
    Adı      varchar(64) ,
    Soyadı      varchar(64) ,
    Branş     varchar(64) ,
    Telefon     varchar(25) ,
    Mail    varchar(250),
    HastaneID      int
)
BEGIN
START TRANSACTION;
    INSERT INTO doktorlar (Adı, Soyadı, Branş, Telefon, Mail, HastaneID)
    VALUES  (Adı, Soyadı, Branş, Telefon, Mail, HastaneID);
COMMIT;
END$$
DELIMITER ;

DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `ecz_doktorguncelle`(
    pDoktorId int , 
    pAdı      varchar(64) ,
    pSoyadı      varchar(64) ,
    pBranş     varchar(64) ,
    pTelefon     varchar(25) ,
    pMail    varchar(250),
    pHastaneID      int 
)
BEGIN
START TRANSACTION;
    UPDATE doktorlar SET Adı=pAdı, Soyadı=pSoyadı , Branş=pBranş , Telefon=pTelefon, Mail=pMail, HastaneID=pHastaneID WHERE DoktorID=pDoktorID ;
COMMIT;
END$$
DELIMITER ;

DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `ecz_doktorhepsi`( 
)
BEGIN
START TRANSACTION;
   SELECT * FROM doktorlar;
COMMIT;
END$$
DELIMITER ;

DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `ecz_doktorsil`(
    pDoktorId int 
)
BEGIN
START TRANSACTION;
    DELETE FROM doktorlar WHERE DoktorId=pDoktorId;
COMMIT;
END$$
DELIMITER ;

DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `ecz_hastabul`( 
    pTC_KimlikNo decimal(11)
)
BEGIN
START TRANSACTION;
   SELECT * FROM hastalar WHERE  TC_KimlikNo = pTC_KimlikNo;
COMMIT;
END$$
DELIMITER ;

DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `ecz_hastaekle`(
    TC       decimal(11) ,
    Adı      varchar(64) ,
    Soyadı      varchar(64) ,
    DoğumTarihi datetime,
    Telefon     varchar(25) ,
    Mail    varchar(250),
    Adres varchar(250)
)
BEGIN
START TRANSACTION;
    INSERT INTO hastalar (TC_KimlikNo ,  Adı , Soyadı, DoğumTarihi, Telefon, Mail, Adres)
    VALUES  (TC ,  Adı , Soyadı, DoğumTarihi, Telefon, Mail, Adres);
COMMIT;
END$$
DELIMITER ;

DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `ecz_hastaguncelle`(
    pTC       decimal(11) ,
    pAdı      varchar(64) ,
    pSoyadı      varchar(64) ,
    pDoğumTarihi datetime,
    pTelefon     varchar(25) ,
    pMail    varchar(250),
    pAdres varchar(250) 
)
BEGIN
START TRANSACTION;
    UPDATE hastalar SET Adı=pAdı, Soyadı=pSoyadı , DoğumTarihi=pDoğumTarihi , Telefon=pTelefon, Mail=pMail, Adres=pAdres WHERE TC_KimlikNo =pTC ;
COMMIT;
END$$
DELIMITER ;

DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `ecz_hastalarhepsi`( 
)
BEGIN
START TRANSACTION;
   SELECT * FROM hastalar;
COMMIT;
END$$
DELIMITER ;

DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `ecz_hastanebul`( 
    pHastaneID int
)
BEGIN
START TRANSACTION;
   SELECT * FROM hastaneler h WHERE  HastaneID = pHastaneID;
COMMIT;
END$$
DELIMITER ;

DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `ecz_hastaneekle`(
    HastaneAdı      varchar(64) ,
    Adres    varchar(250),
    Telefon varchar(25)
)
BEGIN
START TRANSACTION;
    INSERT INTO hastaneler (HastaneAdı ,  Adres , Telefon)
    VALUES  (HastaneAdı ,  Adres , Telefon);
COMMIT;
END$$
DELIMITER ;

DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `ecz_hastaneguncelle`(
    pID  	int ,
    pHastaneAdı 	varchar(64),
    pTelefon  varchar(25),
    pAdres  	varchar(250)    
)
BEGIN
START TRANSACTION;
    UPDATE hastaneler  SET HastaneAdı=pHastaneAdı, Telefon=pTelefon , Adres=pAdres WHERE HastaneID=pID;
COMMIT;
END$$
DELIMITER ;

DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `ecz_hastanelerhepsi`( 
)
BEGIN
START TRANSACTION;
   SELECT * FROM hastaneler;
COMMIT;
END$$
DELIMITER ;

DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `ecz_hastanesil`(
    pHastaneID int 
)
BEGIN
START TRANSACTION;
    DELETE FROM hastaneler WHERE HastaneID=pHastaneID;
COMMIT;
END$$
DELIMITER ;

DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `ecz_hastasil`(
    pTC decimal(11)
)
BEGIN
START TRANSACTION;
    DELETE FROM hastalar WHERE TC_KimlikNo=pTC;
COMMIT;
END$$
DELIMITER ;

DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `ecz_ilacbilgiguncelleme`(
    pBarkodNo varchar(250),
    pIlacAdı 	varchar(64) ,
    pKategori 	varchar(64) ,
    pFirma 	varchar(64),
    pBirimFiyat 	varchar(25)  ,
    pAçıklama 	varchar(250),
    pBirimi 	varchar(25)
)
BEGIN
START TRANSACTION;
    UPDATE ilaclar SET IlacAdı = pIlacAdı ,Kategori=pKategori ,Firma=pFirma, BirimFiyat=pBirimFiyat, Açıklama=pAçıklama, Birimi=Birimi  WHERE BarkodNo =pBarkodNo;
COMMIT;
END$$
DELIMITER ;

DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `ecz_ilacbul`( 
    pBarkodNo varchar(250)
)
BEGIN
START TRANSACTION;
   SELECT * FROM ilaclar WHERE BarkodNo=pBarkodNo;
COMMIT;
END$$
DELIMITER ;

DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `ecz_ilaclarhepsi`( 
)
BEGIN
START TRANSACTION;
   SELECT * FROM ilaclar;
COMMIT;
END$$
DELIMITER ;

DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `ecz_ilacsil`(
    pBarkodNo  varchar(250) 
)
BEGIN
START TRANSACTION;
    DELETE FROM ilaclar WHERE BarkodNo=pBarkodNo;
COMMIT;
END$$
DELIMITER ;

DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `ecz_ilacstokguncelleme`(
	 pBarkodNo varchar(250),
     pStokMiktarı int
)
BEGIN
START TRANSACTION;
    UPDATE ilaclar SET StokMiktarı = StokMiktarı+pStokMiktarı  WHERE BarkodNo =pBarkodNo    ;
COMMIT;
END$$
DELIMITER ;

DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `ecz_odemeekle`(
    ReceteID 	int(11)  ,
    OdemeTarihi 	datetime  ,
    OdemeTutari 	float ,
    OdemeTuru 	varchar(25)  ,
    Aciklama 	varchar(50) 
)
BEGIN
START TRANSACTION;
    INSERT INTO ödemeler (ReceteID , OdemeTarihi, OdemeTutari, OdemeTuru, Aciklama)
    VALUES  (ReceteID , OdemeTarihi, OdemeTutari, OdemeTuru, Aciklama);
COMMIT;
END$$
DELIMITER ;

DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `ecz_odemeguncelleme`(
    pReceteID 	int(11)  ,
    pOdemeTarihi 	datetime  ,
    pOdemeTutari 	float ,
    pOdemeTuru 	varchar(25)  ,
    pAciklama 	varchar(50)    
)
BEGIN
START TRANSACTION;
    UPDATE ödemeler SET OdemeTarihi = pOdemeTarihi , OdemeTutari=pOdemeTutari , OdemeTuru=pOdemeTuru , Aciklama=pAciklama WHERE ReceteID =pReceteID;
COMMIT;
END$$
DELIMITER ;

DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `ecz_odemeleribul`(
    pReceteID int
)
BEGIN
START TRANSACTION;
   SELECT * from ödemeler o WHERE o.ReceteID = pReceteID;
COMMIT;
END$$
DELIMITER ;

DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `ecz_odemesil`(
    pReceteID int 
)
BEGIN
START TRANSACTION;
    DELETE FROM ödemeler WHERE ReceteID=pReceteID;
COMMIT;
END$$
DELIMITER ;

DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `ecz_recetecekle`(
    ReceteID       INT,
    ReceteTarihi   DATETIME,
    DoktorID       INT,
    TC_KimlikNo    DECIMAL(11,0)
)
BEGIN
    START TRANSACTION;
        INSERT INTO reçeteler (ReceteID, ReceteTarihi, DoktorID, TC_KimlikNo)
        VALUES (ReceteID, ReceteTarihi, DoktorID, TC_KimlikNo);
    COMMIT;
END$$
DELIMITER ;

DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `ecz_receteguncelleme`(
    pReceteID  	int ,
    pReceteTarihi 	datetime,
    pDoktorID  int,
    pTC_KimlikNo  	decimal(11)    
)
BEGIN
START TRANSACTION;
    UPDATE reçeteler SET ReceteTarihi = pReceteTarihi , DoktorID=pDoktorID , TC_KimlikNo=pTC_KimlikNo WHERE ReceteID =pReceteID;
COMMIT;
END$$
DELIMITER ;

DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `ecz_receteilaclariguncelleme`(
    pReceteID  	int ,
    pBarkodNo     varchar(250),
    pDoz int
)
BEGIN
START TRANSACTION;
    UPDATE recete_ilaclari SET BarkodNo = pBarkodNo , Doz=pDoz WHERE ReceteID =pReceteID;
COMMIT;
END$$
DELIMITER ;

DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `ecz_receteilacsil`(
    pReceteID int,
    pBarkodNo  varchar(250) 
)
BEGIN
START TRANSACTION;
    DELETE FROM recete_ilaclari WHERE ReceteID=pReceteID AND BarkodNo=pBarkodNo;
COMMIT;
END$$
DELIMITER ;

DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `ecz_recetelerhepsi`( 
)
BEGIN
START TRANSACTION;
   SELECT * FROM reçeteler;
COMMIT;
END$$
DELIMITER ;

DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `ecz_recetelerveilaclaribuli`(
	pReceteID Int
)
BEGIN
START TRANSACTION;
   SELECT 
   r.ReceteID,r.ReceteTarihi ,r.TC_KimlikNo,Concat(h.Adı , ' ' , h.Soyadı) as 'Hasta Adı Soyadı',ri.BarkodNo,ri.Doz,i.BirimFiyat
   FROM reçeteler r INNER JOIN recete_ilaclari ri on r.ReceteID=ri.ReceteID
   INNER JOIN hastalar h on h.TC_KimlikNo=r.TC_KimlikNo
   INNER JOIN ilaclar i on i.BarkodNo=ri.BarkodNo WHERE ri.ReceteID=pReceteID;
COMMIT;
END$$
DELIMITER ;

DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `ecz_recetelerveilaclarihepsi`()
BEGIN
START TRANSACTION;
   SELECT 
   r.ReceteID,r.ReceteTarihi ,r.TC_KimlikNo,Concat(h.Adı , ' ' , h.Soyadı) as 'Hasta Adı Soyadı',ri.BarkodNo
   FROM reçeteler r INNER JOIN recete_ilaclari ri on r.ReceteID=ri.ReceteID
   INNER JOIN hastalar h on h.TC_KimlikNo=r.TC_KimlikNo;
COMMIT;
END$$
DELIMITER ;

DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `ecz_recetelerveodemelerihepsi`( 
)
BEGIN
START TRANSACTION;
   SELECT 
   r.ReceteID,r.ReceteTarihi,r.DoktorID,r.TC_KimlikNo,Concat(h.Adı , ' ' , h.Soyadı) as 'Hasta Adı Soyadı',o.OdemeTutari
   FROM reçeteler r INNER JOIN ödemeler o on r.ReceteID=o.ReceteID
   INNER JOIN hastalar h on h.TC_KimlikNo=r.TC_KimlikNo;
COMMIT;
END$$
DELIMITER ;

DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `ecz_recetesil`(
    pReceteID int 
)
BEGIN
START TRANSACTION;
    DELETE FROM reçeteler WHERE ReceteID=pReceteID;
COMMIT;
END$$
DELIMITER ;

DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `ecz_receteyeilacekle`(
    ReceteID  	int ,
    BarkodNo     varchar(250),
    Doz int
)
BEGIN
START TRANSACTION;
    INSERT INTO recete_ilaclari (ReceteID ,  BarkodNo , Doz)
    VALUES  (ReceteID ,  BarkodNo , Doz);
COMMIT;
END$$
DELIMITER ;

DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `ecz_yeniilacekle`(
    BarkodNo	varchar(250)  ,
    IlacAdı 	varchar(64) ,
    Kategori 	varchar(64) ,
    Firma 	varchar(64),
    BirimFiyat 	varchar(25)  ,
    Açıklama 	varchar(250) ,
    StokMiktarı 	int,
    Birimi 	varchar(25) 
)
BEGIN
START TRANSACTION;
    INSERT INTO ilaclar (BarkodNo ,  IlacAdı , Kategori, Firma, BirimFiyat, Açıklama, StokMiktarı , Birimi)
    VALUES  (BarkodNo ,  IlacAdı , Kategori, Firma, BirimFiyat, Açıklama, StokMiktarı , Birimi);
COMMIT;
END$$
DELIMITER ;

-- ----------------------------------------------------------------------------------------------

--
-- Tetikleyiciler `recete_ilaclari`
--
DELIMITER $$
CREATE TRIGGER `ecz_ilacStokKontrol` BEFORE INSERT ON `recete_ilaclari` FOR EACH ROW BEGIN
    declare tBarkodNo int;   
    declare tStokMiktarı int;   
    declare tDoz int;   

    declare hatamesaj varchar(250);

    set tBarkodNo = NEW.BarkodNo;
    set tDoz = NEW.Doz; 
                 
    
    select StokMiktarı into tStokMiktarı  
    from ilaclar  where BarkodNo = tBarkodNo;

    IF (tDoz > tStokMiktarı )  THEN
        set hatamesaj = CONCAT('hoop! ', tDoz, ' adet satılmak isteniyor, ancak ', tStokMiktarı, ' adet var!');
        SIGNAL SQLSTATE '45000'  SET MESSAGE_TEXT = hatamesaj;
    END IF;
    
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `ecz_ilac_stok_azalt` AFTER INSERT ON `recete_ilaclari` FOR EACH ROW BEGIN
    declare tBarkodNo  int;   
    declare tStokMiktarı  int;  

    declare sid int;  
    declare tDoz  int;   

    set tBarkodNo = NEW.BarkodNo ;
    set sid = NEW.ID ;
    set tDoz = NEW.Doz;
    
    select StokMiktarı into tStokMiktarı  
    from ilaclar  where BarkodNo = tBarkodNo;
    
    update ilaclar set StokMiktarı  = StokMiktarı - tDoz 
    where BarkodNo = tBarkodNo;

END
$$
DELIMITER ;

-- ------------------------------------------------------------------------------------------------------------

-- Fonksiyonlar

DELIMITER //
CREATE FUNCTION ilacStok(
	fBarkodNo varchar(250)
) 
RETURNS Int DETERMINISTIC
BEGIN
DECLARE stk Int; 
START TRANSACTION;
    select i.StokMiktarı into stk  
    from ilaclar i  where i.BarkodNo = fBarkodNo;
COMMIT;
RETURN stk;
END  //
DELIMITER ;






