/*Insert user types*/
INSERT INTO auctions.user_typ
(user_typ_cd, user_typ)
VALUES
(10,'User'),
(20,'Professional'),
(30,'Admin')
;


/* Insert trade types
Source - http://www.training.nsw.gov.au/skills_trade_recognition/trade_recognition/trade_list/
*/
INSERT INTO auctions.trade_typ
(trade_typ)
VALUES
('Bricklaying'),
('Carpentry'),
('Carpentry and Joinery'),
('Civil Construction'),
('Civil Construction - Design'),
('Civil Construction - Management'),
('Civil Construction - Operations'),
('Civil Construction - Supervision'),
('Construction Carpentry'),
('Fire Protection'),
('Joinery'),
('Joinery (Stairs)'),
('Roof Plumbing'),
('Painting & Decorating'),
('Plastering (Solid)'),
('Plumbing'),
('Roof Tiling'),
('Shopfitting'),
('Signcraft'),
('Stonemasonry'),
('Wall & Ceiling Lining'),
('Wall & Floor Tiling'),
('Cabinet Making (Furniture)'),
('Cabinet Making (Kitchens & Bathrooms)'),
('Furnishing - Floor Technology'),
('Furniture Polishing'),
('Glass Cutting and Glazing'),
('Upholstery'),
('Wood Machining'),
('Engineering (Electrical/Electronic)'),
('Engineering (Fabrication)'),
('Engineering (Mechanical)'),
('Locksmithing'),
('Landscaping'),
('Electrical (Appliance Servicing)'),
('Electrical (Electrical Machine Repair)'),
('Electrical (Electrician)'),
('Electrical (Instruments)'),
('Electrical (Rail Signalling)'),
('Electrical (Switchgear and Control Gear) '),
('Electricity Supply Industry Cable Jointing'),
('Electricity Supply Industry Distribution'),
('Electricity Supply Industry Network Infrastructure'),
('Electricity Supply Industry Power Systems'),
('Electricity Supply Industry Rail Traction'),
('Electricity Supply Industry Substation'),
('Electricity Supply Industry Transmission'),
('Electronic (Communications)'),
('Electronic (Computer Systems)'),
('Electronic (Data Communications)'),
('Electronic (Scanning & Detection)'),
('Electrotechnology (Industrial Electronics and Control)'),
('Electrotechnology (Instrumentation & Control)'),
('Lift Systems (Electrical)'),
('Refrigeration/Air Conditioning (Mechanic)')
;

/*  Insert listing types   */
/*INSERT INTO auctions.listing_typ
(list_typ)
VALUES
('')
;
*/

/*  Insert initial users  */
INSERT INTO auctions.user
(   username
  , first_name
  , last_name
  , address1
  , address2
  , city
  , state
  , postcode
  , email
  , signup_tmstmp
  , user_typ_cd
)
VALUES
('tomble', 'Peter', 'Tomlinson', '123 Fake St', NULL, 'Adelaide'
  , 'SA', 5000, 's3384711@student.rmit.edu.au', now(), 30),
('gbourke', 'Garret', 'Bourke', '456 Easy St', NULL, 'Sydney'
  , 'NSW', 2000, 's3363094@student.rmit.edu.au', now(), 30),
('jhobbs', 'Jalal', 'Hobbs', '13 Elm St', NULL, 'Adelaide'
  , 'SA', 5000, 's3507453@student.rmit.edu.au', now(), 30),
('mwall', 'Matthew', 'Wall', '1 Dowel St', NULL, 'Sydney'
  , 'NSW', 2000, 's3310652@student.rmit.edu.au', now(), 30),
;

/*  insert further users  -  http://www.fakenamegenerator.com/gen-male-au-au.php*/
INSERT INTO auctions.user
(   username
  , first_name
  , last_name
  , address1
  , address2
  , city
  , state
  , postcode
  , email
  , signup_tmstmp
  , user_typ_cd
)
VALUES
('dcopley', 'Daniel', 'Copley', '2 Maintongoon Rd', NULL, 'Coopers Creek'
  , 'VIC', 3825, 'DanielCopley@teleworm.us', now(), 20),
('jfinn', 'Jordan', 'Finn', '63 Amiens Rd', NULL, 'Havilah'
  , 'NSW', 2850, 'JordanFinn@armyspy.com', now(), 20),
('pmceachern', 'Patrick', 'McEachern', '71 Hebbard St', NULL, 'Dendy'
  , 'VIC', 3186, 'PatrickMcEachern@dayrep.com', now(), 20),
('larnott', 'Lara', 'Arnott', '61 Daly Tce', NULL, 'Nowergup'
  , 'WA', 6032, 'LaraArnott@rhyta.com', now(), 20),
('bmcevilly', 'Bianca', 'McEvilly', '87 Ranworth Road', NULL, 'Langford'
  , 'WA', 6147, 'BiancaMcEvilly@armyspy.com', now(), 10),
('mclemes', 'Matilda', 'Clemes', '88 Savages Road', NULL, 'Eight Mile Plains'
  , 'QLD', 4113, 'MatildaClemes@dayrep.com', now(), 10),
('rgallagher', 'Riley', 'Gallagher', '75 Berambing Crcnt', NULL, 'Wilmot'
  , 'NSW', 2770, 'RileyGallagher@armyspy.com', now(), 10),
('tlu', 'Tao', 'Lu', '22 Henry Street', NULL, 'St Leonards'
  , 'VIC', 3223, 'TaoLu@rhyta.com', now(), 10)
;

/*  Insert user trade types  */
INSERT INTO auctions.trade_typ_lnk
(
    user_id
  , trade_typ_cd
)
VALUES
(5,1),
(5,4),
(5,20),
(5,34),
(6,2),
(6,3),
(6,9),
(6,11),
(6,18),
(7,37),
(7,16),
(7,15),
(8,16),
(8,1),
(8,55)
;

/*  Insert professional bio - http://www.generatorland.com/glgenerator.aspx?id=124*/
INSERT INTO auctions.Professional_info
(
    user_id
  , bio
)
VALUES
(5,'Was quite successful at building cabbage in Ocean City, NJ. Had moderate success marketing Yugos in the UK. Was quite successful at deploying foreign currency in Deltona, FL. Developed several new methods for licensing toy elephants on Wall Street. Enthusiastic about managing teddy bears in Fort Walton Beach, FL. Earned praise for marketing weed whackers in Hanford, CA.'),
(6,'Gifted in buying and selling puppets in Ocean City, NJ. At the moment Im getting to know bagpipes in Deltona, FL. Earned praise for deploying inflatable dolls for the underprivileged. Spent 2001-2004 analyzing the elderly for the government. At the moment Im consulting about weebles in the financial sector. In 2009 I was short selling psoriasis in Naples, FL.'),
(7,'Spent 2001-2004 short selling dolls in Phoenix, AZ. Spent high school summers licensing pogo sticks in Tampa, FL. In 2008 I was writing about dandruff on Wall Street. Spent several months implementing methane in Cuba. Uniquely-equipped for developing strategies for cellos in Phoenix, AZ. Uniquely-equipped for researching toy planes in Phoenix, AZ.'),
(8,'Set new standards for deploying carp in Cuba. Earned praised for my work writing about psoriasis in Edison, NJ. Lead a team investing in psoriasis in Cuba. Practiced in the art of deploying toy monkeys in the aftermarket. Spent 2001-2008 building corncob pipes in the government sector. Prior to my current job I was writing about robotic shrimp for no pay.')
;

/*  Set up initial passwords */
INSERT INTO auctions.pword
(
   user_id
 , pword
) 
SELECT user_id
       ,md5(concat('mypassword44',signup_tmstmp)) 
FROM auctions.user
;

/*  Insert a listing type */
INSERT INTO auctions.listing_typ
(
   list_typ
)
VALUES
('Auction'),
('Fixed Price')
;

/*   Insert a dummy listing   */
INSERT INTO auctions.listing
(
   list_user_id
 , list_strt_tmstmp
 , list_end_tmstmp
 , list_typ_cd
 , list_addr_id
 , shrt_descn
 , lng_descn
 , job_len
 , strt_bid
 , photo_url
 , visible
)
VALUES
(10,now(), DATE_ADD(NOW(), INTERVAL 7 DAY), 1, null, 'Dig this Hole', 'I am looking for someone to dig a hole for me',3,120,null, TRUE)
;



