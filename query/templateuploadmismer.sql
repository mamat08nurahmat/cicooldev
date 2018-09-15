

CREATE TABLE `templateuploadmismer` (
   -- `BatchID` int(11) NOT NULL,
  `MID` int(11) NOT NULL,
  `MERCHAN_DBA_NAME` varchar(55) DEFAULT NULL,
  `STATUS_EDC` varchar(55) DEFAULT NULL,
  `OPEN_DATE` date NOT NULL,
  `MSO` varchar(55) DEFAULT NULL,
  `SOURCE_CODE` varchar(255) DEFAULT NULL,
  `POS1` varchar(25) DEFAULT NULL,
  `IS_VALID` int(11) DEFAULT 0 ,
  `ID` int(11) NOT NULL AUTO_INCREMENT,  
  PRIMARY  KEY (ID)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- drop table templateuploadmismer
-- select * from templateuploadmismer

CREATE TABLE `mismerdetail` (
  `RowID` int(11) NOT NULL AUTO_INCREMENT,
  `BatchID` int(11) NOT NULL,
  `OPEN_DATE` date DEFAULT NULL,
  `MID` varchar(55) DEFAULT NULL,
  `MERCHAN_DBA_NAME` varchar(55) DEFAULT NULL,
  `MSO` varchar(55) DEFAULT NULL,
  `SOURCE_CODE` varchar(55) DEFAULT NULL,
  `POS1` varchar(55) DEFAULT NULL,
  `WILAYAH` varchar(55) DEFAULT NULL,
  `CHANNEL` varchar(55) DEFAULT NULL,
  `TYPE_MID` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`RowID`)
) ENGINE=InnoDB AUTO_INCREMENT=437431 DEFAULT CHARSET=latin1




CREATE TABLE `mismerunmatch` (
  `RowID` int(11) NOT NULL AUTO_INCREMENT,
  `BatchID` int(11) NOT NULL,
  `OPEN_DATE` date DEFAULT NULL,
  `MID` varchar(55) DEFAULT NULL,
  `MERCHAN_DBA_NAME` varchar(55) DEFAULT NULL,
  `MSO` varchar(55) DEFAULT NULL,
  `SOURCE_CODE` varchar(55) DEFAULT NULL,
  `POS1` varchar(55) DEFAULT NULL,
  `WILAYAH` varchar(55) DEFAULT NULL,
  `CHANNEL` varchar(55) DEFAULT NULL,
  `TYPE_MID` varchar(45) DEFAULT NULL,
`IS_UPDATE` int(11) DEFAULT 0 ,  
  PRIMARY KEY (`RowID`)
) ENGINE=InnoDB AUTO_INCREMENT=437431 DEFAULT CHARSET=latin1

select * from  templateuploadunmatch

CREATE TABLE `templateuploadunmatch` (
  `OPEN_DATE` date DEFAULT NULL,
  `MID` varchar(55) DEFAULT NULL,
  `MERCHAN_DBA_NAME` varchar(55) DEFAULT NULL,
  `MSO` varchar(55) DEFAULT NULL,
  `SOURCE_CODE` varchar(55) DEFAULT NULL,
  `POS1` varchar(55) DEFAULT NULL,
  `WILAYAH` varchar(55) DEFAULT NULL,
  `CHANNEL` varchar(55) DEFAULT NULL,
  `TYPE_MID` varchar(45) DEFAULT NULL,
  `RowID` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`RowID`)
) ENGINE=InnoDB AUTO_INCREMENT=437431 DEFAULT CHARSET=latin1



-- select * from mismerunmatch

-- ===========================
-- TRUNCATE `mismer`.`templateuploadmismer`;
-- LOAD DATA INFILE 'C:/xampp/htdocs/mismer/uploads/systemupload/MISMER_2018-09-12.csv' 
LOAD DATA INFILE 'C:/xampp/htdocs/cicooldev/DevUploadMismer.csv' 
INTO TABLE templateuploadmismer
FIELDS TERMINATED BY ',' 
ENCLOSED BY '"'
LINES TERMINATED BY '\n'
 IGNORE 1 ROWS
(MID,MERCHAN_DBA_NAME,STATUS_EDC,@OPEN_DATE,MSO,SOURCE_CODE,POS1,IS_VALID,ID)
SET OPEN_DATE = STR_TO_DATE(@OPEN_DATE, '%m/%d/%Y');


-- truncate templateuploadmismer
-- select * from templateuploadmismer



-- ==============GENERATE====================

-- select * from mismerdetail
-- truncate mismerdetail
 SET SQL_SAFE_UPDATES = 0;
delete from mismerdetail where MID IN(select MID from templateuploadmismer)
-- =========================================================
INSERT INTO mismerdetail

SELECT 
NULL RowID,
-- a.RowID,
-- (SELECT max(BatchID) as BatchID FROM systemupload) BatchID,
999 BatchID,

--  date_format(str_to_date(a.OPEN_DATE,'%m/%d/%Y'),'%Y/%m/%d')
-- AS OPEN_DATE , 

a.OPEN_DATE,


a.MID,
a.MERCHAN_DBA_NAME,
a.MSO,
a.SOURCE_CODE,

CASE
	WHEN a.POS1 <= 100 THEN 1
	ELSE LEFT(a.POS1,1)
END
AS
POS1,

CASE
	WHEN LEFT(a.MSO,1)='A' THEN 'WMD'
	WHEN LEFT(a.MSO,1)='B' THEN 'WPD'
	WHEN LEFT(a.MSO,1)='C' THEN 'WPL'
	WHEN LEFT(a.MSO,1)='D' THEN 'WBN'
	WHEN LEFT(a.MSO,1)='E' THEN 'WSM'
	WHEN LEFT(a.MSO,1)='F' THEN 'WSY'
	WHEN LEFT(a.MSO,1)='G' THEN 'WMK'
	WHEN LEFT(a.MSO,1)='H' THEN 'WDR'
	WHEN LEFT(a.MSO,1)='I' THEN 'WBJ'
	WHEN LEFT(a.MSO,1)='J' THEN 'WMO'
	WHEN LEFT(a.MSO,1)='K' THEN 'WPU'
	WHEN LEFT(a.MSO,1)='L' THEN 'WJS'
	WHEN LEFT(a.MSO,1)='M' THEN 'WJK'
	WHEN LEFT(a.MSO,1)='N' THEN 'WJB'
	WHEN LEFT(a.MSO,1)='O' THEN 'WJY'
	WHEN LEFT(a.MSO,1)='R' THEN 'WYK'
	WHEN LEFT(a.MSO,1)='S' THEN 'WMA'	
    
	WHEN SUBSTRING(a.MID,2,2)='01' THEN 'WMD'
	WHEN SUBSTRING(a.MID,2,2)='02' THEN 'WPD'
	WHEN SUBSTRING(a.MID,2,2)='03' THEN 'WPL'
	WHEN SUBSTRING(a.MID,2,2)='04' THEN 'WBN'
	WHEN SUBSTRING(a.MID,2,2)='05' THEN 'WSM'
	WHEN SUBSTRING(a.MID,2,2)='06' THEN 'WSY'
	WHEN SUBSTRING(a.MID,2,2)='07' THEN 'WMK'
	WHEN SUBSTRING(a.MID,2,2)='08' THEN 'WDR'
	WHEN SUBSTRING(a.MID,2,2)='09' THEN 'WBJ'
	WHEN SUBSTRING(a.MID,2,2)='10' THEN 'WJS'
	WHEN SUBSTRING(a.MID,2,2)='11' THEN 'WMO'
	WHEN SUBSTRING(a.MID,2,2)='12' THEN 'WJK'
	WHEN SUBSTRING(a.MID,2,2)='14' THEN 'WJB'
	WHEN SUBSTRING(a.MID,2,2)='15' THEN 'WJY'
	WHEN SUBSTRING(a.MID,2,2)='16' THEN 'WPU'
	WHEN SUBSTRING(a.MID,2,2)='17' THEN 'WYK'
	WHEN SUBSTRING(a.MID,2,2)='18' THEN 'WMA'    
    
-- 	WHEN LEFT(a.MSO,1)='' THEN 'BLANK'
  	ELSE NULL
END

as WILAYAH,


mc.Channel as CHANNEL,
 

 
 
 CASE

	WHEN LEFT(a.MID,1)='3'  THEN 'YAP'

  	ELSE 'EDC'
END

as TYPE_MID

 

FROM templateuploadmismer a 

LEFT JOIN mso_channel mc ON a.MSO=mc.MSO

-- WHERE a.ID IN(select ID from templateuploadmismer) 


-- AND IS_VALID=1


-- ============================
SELECT * FROM 

UPDATE
mismerdetail
SET CHANNEL='EXH'
WHERE MERCHAN_DBA_NAME like'%EXH%'


-- select * from  mismerunmatch
INSERT INTO mismerunmatch

SELECT 
RowID,
BatchID,
OPEN_DATE,
MID,
MERCHAN_DBA_NAME,
MSO,
SOURCE_CODE,
POS1,
WILAYAH,
CHANNEL,
TYPE_MID,
0 IS_UPDATE

FROM mismerdetail
WHERE TYPE_MID='EDC'
AND CHANNEL IS NULL



-- ===================insert unmatch


-- ===========================
-- TRUNCATE `mismer`.`templateuploadmismer`;
-- LOAD DATA INFILE 'C:/xampp/htdocs/mismer/uploads/systemupload/MISMER_2018-09-12.csv' 
LOAD DATA INFILE 'C:/xampp/htdocs/cicooldev/DevUploadUnmatch.csv' 
INTO TABLE templateuploadunmatch
FIELDS TERMINATED BY ',' 
ENCLOSED BY '"'
LINES TERMINATED BY '\n'
 IGNORE 1 ROWS
(@OPEN_DATE,MID,MERCHAN_DBA_NAME,MSO,SOURCE_CODE,POS1,WILAYAH,CHANNEL,TYPE_MID,RowID)
SET OPEN_DATE = STR_TO_DATE(@OPEN_DATE, '%m/%d/%Y');


select * from templateuploadunmatch

select * from mismerunmatch

update mismerunmatch
SET WILAYAH='xxx'
,CHANNEL='xxx'
,IS_UPDATE=1

WHERE MID=''
