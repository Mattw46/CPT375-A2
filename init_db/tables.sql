-- Table bids
CREATE TABLE bids (
   bid_id int    NOT NULL  AUTO_INCREMENT,
   listing_id int    NOT NULL ,
   bid_user_id int    NOT NULL ,
   bid_tmstmp timestamp    NOT NULL ,
   bid_amnt decimal(15,2)    NOT NULL ,
   CONSTRAINT bids_pk PRIMARY KEY (bid_id)
);

-- Table feedback
CREATE TABLE feedback (
   feedback_id int    NOT NULL  AUTO_INCREMENT,
   list_user_id int    NOT NULL ,
   pro_user_id int    NOT NULL ,
   listing_id int    NOT NULL ,
   rating int    NOT NULL ,
   feedback text    NOT NULL ,
   CONSTRAINT feedback_pk PRIMARY KEY (feedback_id)
);

-- Table list_addr
CREATE TABLE list_addr (
   list_addr_id int    NOT NULL  AUTO_INCREMENT,
   address1 varchar(50)    NOT NULL ,
   address2 varchar(50)    NOT NULL ,
   city varchar(20)    NOT NULL ,
   state varchar(3)    NOT NULL ,
   postcode int    NOT NULL ,
   CONSTRAINT list_addr_pk PRIMARY KEY (list_addr_id)
);

-- Table listing
CREATE TABLE listing (
   listing_id int    NOT NULL  AUTO_INCREMENT,
   list_user_id int    NOT NULL ,
   list_strt_tmstmp timestamp    NOT NULL ,
   list_end_tmstmp timestamp    NOT NULL ,
   list_typ_cd int    NOT NULL ,
   list_addr_id int ,
   shrt_descn varchar(50)    NOT NULL ,
   lng_descn text    NOT NULL ,
   job_len int NOT NULL ,
   strt_bid int NOT NULL ,
   photo_url varchar(20)  ,
   visible bool    NOT NULL ,
   CONSTRAINT listing_pk PRIMARY KEY (listing_id)
);
CREATE INDEX Listing_idx_1 ON listing (list_user_id);

-- Table listing_typ
CREATE TABLE listing_typ (
   list_typ_cd int    NOT NULL  AUTO_INCREMENT,
   list_typ varchar(20)    NOT NULL ,
   CONSTRAINT listing_typ_pk PRIMARY KEY (list_typ_cd)
);

-- Table Professional_info
CREATE TABLE Professional_info (
   user_id int    NOT NULL ,
   bio text    NOT NULL ,
   CONSTRAINT Professional_info_pk PRIMARY KEY (user_id)
);

-- Table pword
CREATE TABLE pword (
   user_id int    NOT NULL ,
   pword varchar(32)    NOT NULL ,
   CONSTRAINT pword_pk PRIMARY KEY (user_id)
);

-- Table trade_typ
CREATE TABLE trade_typ (
   trade_typ varchar(60)    NOT NULL ,
   trade_typ_cd int    NOT NULL ,
   CONSTRAINT trade_typ_pk PRIMARY KEY (trade_typ_cd)
);

-- Table trade_typ_lnk
CREATE TABLE trade_typ_lnk (
   user_id int    NOT NULL ,
   trade_typ_cd int    NOT NULL ,
   CONSTRAINT trade_typ_lnk_pk PRIMARY KEY (user_id,trade_typ_cd)
);

-- Table user
CREATE TABLE user (
   user_id int    NOT NULL  AUTO_INCREMENT,
   username varchar(30)    NOT NULL ,
   first_name varchar(30)    NOT NULL ,
   last_name varchar(30)    NOT NULL ,
   address1 varchar(50)    NOT NULL ,
   address2 varchar(50)    NULL ,
   city varchar(30)    NOT NULL ,
   state varchar(3)    NOT NULL ,
   postcode int    NOT NULL ,
   email varchar(50)    NOT NULL ,
   signup_tmstmp timestamp    NOT NULL ,
   user_typ_cd int    NOT NULL ,
   CONSTRAINT user_pk PRIMARY KEY (user_id)
);

-- Table user_typ
CREATE TABLE user_typ (
   user_typ varchar(12)    NOT NULL ,
   user_typ_cd int    NOT NULL ,
   CONSTRAINT user_typ_pk PRIMARY KEY (user_typ_cd)
);




