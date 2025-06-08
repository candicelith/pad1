-- SQL script to import student data from CSV into database

-- Insert data for each student

-- // Angkatan 19
-- ANANDA DWI RAHMAWATI
INSERT INTO users (id_roles, email, password) VALUES (2, 'ananda.dwirahmawati313@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '19/441217/SV/16569', 'ANANDA DWI RAHMAWATI', 2019);

-- AYU KINANTHI PUTRI SETYONINGTYAS
INSERT INTO users (id_roles, email, password) VALUES (2, 'aiyukape@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '19/441219/SV/16571', 'AYU KINANTHI PUTRI SETYONINGTYAS', 2019);

-- DHIAULHAQ ARYAPUTRA FALAH AMURYA
INSERT INTO users (id_roles, email, password) VALUES (2, 'aryaputra@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '19/441221/SV/16573', 'DHIAULHAQ ARYAPUTRA FALAH AMURYA', 2019);

-- GUNAWAN PRASETYA
INSERT INTO users (id_roles, email, password) VALUES (2, 'gunawanprasetya10@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '19/441223/SV/16575', 'GUNAWAN PRASETYA', 2019);

-- HEGIN CHRISTIN ANGELI
INSERT INTO users (id_roles, email, password) VALUES (2, 'heginchristinangeli22@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '19/441225/SV/16577', 'HEGIN CHRISTIN ANGELI', 2019);

-- LUCKY DEWA SATRIA
INSERT INTO users (id_roles, email, password) VALUES (2, 'lucky.dewa.s@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '19/441227/SV/16579', 'LUCKY DEWA SATRIA', 2019);

-- MUHAMMAD ADIN PALIMBANI
INSERT INTO users (id_roles, email, password) VALUES (2, '6285382903804@simaster', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '19/441229/SV/16581', 'MUHAMMAD ADIN PALIMBANI', 2019);

-- MUHAMMAD ZAKI SULISTYA
INSERT INTO users (id_roles, email, password) VALUES (2, 'zaki.sulistya@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '19/441231/SV/16583', 'MUHAMMAD ZAKI SULISTYA', 2019);

-- NININ ERNAWATI
INSERT INTO users (id_roles, email, password) VALUES (2, 'nininernawati@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '19/441233/SV/16585', 'NININ ERNAWATI', 2019);

-- RESTIANA FADHILAH PUTRI
INSERT INTO users (id_roles, email, password) VALUES (2, 'restianafp@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '19/441235/SV/16587', 'RESTIANA FADHILAH PUTRI', 2019);

-- SALSABILA LAILY RAHMA
INSERT INTO users (id_roles, email, password) VALUES (2, 'salsabilalaily@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '19/441237/SV/16589', 'SALSABILA LAILY RAHMA', 2019);

-- AGNIA ADZILLAWATI
INSERT INTO users (id_roles, email, password) VALUES (2, 'agniaadzll@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '19/447130/SV/16849', 'AGNIA ADZILLAWATI', 2019);

-- BERNARDINUS NICHOLAS MARTIN
INSERT INTO users (id_roles, email, password) VALUES (2, 'nklsmrtn33@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '19/447132/SV/16851', 'BERNARDINUS NICHOLAS MARTIN', 2019);

-- FAJAR MUHAIKAL AMAL
INSERT INTO users (id_roles, email, password) VALUES (2, 'fajarmuhaikal12@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '19/447134/SV/16853', 'FAJAR MUHAIKAL AMAL', 2019);

-- GALIH INDRA FIRMANSYAH
INSERT INTO users (id_roles, email, password) VALUES (2, 'galihindra2401@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '19/447136/SV/16855', 'GALIH INDRA FIRMANSYAH', 2019);

-- MARHAENDRAJAYA A S
INSERT INTO users (id_roles, email, password) VALUES (2, 'marhaendra44@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '19/447138/SV/16857', 'MARHAENDRAJAYA A S', 2019);

-- MOH. HERLAMBANG AKASYAH
INSERT INTO users (id_roles, email, password) VALUES (2, 'begeniro@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '19/447140/SV/16859', 'MOH. HERLAMBANG AKASYAH', 2019);

-- VALENTINO PAKSIDENA GRIFFITH VALERYAN
INSERT INTO users (id_roles, email, password) VALUES (2, 'vgriffith97@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '19/447144/SV/16863', 'VALENTINO PAKSIDENA GRIFFITH VALERYAN', 2019);

-- DENNIS ALFA IMANUEL
INSERT INTO users (id_roles, email, password) VALUES (2, 'dennisalfa01@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '19/447317/SV/17011', 'DENNIS ALFA IMANUEL', 2019);

-- RAGAJIWA ASA
INSERT INTO users (id_roles, email, password) VALUES (2, 'ragajiwa.asa@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '19/447319/SV/17013', 'RAGAJIWA ASA', 2019);

-- ALFIAH NUR HIDAYATI
INSERT INTO users (id_roles, email, password) VALUES (2, 'alfiahnur2019@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '19/441216/SV/16568', 'ALFIAH NUR HIDAYATI', 2019);

-- CHRISTIAN LAMHOT TUA
INSERT INTO users (id_roles, email, password) VALUES (2, 'christian.l.t@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '19/441220/SV/16572', 'CHRISTIAN LAMHOT TUA', 2019);

-- FARHAN MUFTI HILMY
INSERT INTO users (id_roles, email, password) VALUES (2, 'farhanmuftihilmy@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '19/441222/SV/16574', 'FARHAN MUFTI HILMY', 2019);

-- HARINE AMALIA RAHMA
INSERT INTO users (id_roles, email, password) VALUES (2, 'harineamalia125@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '19/441224/SV/16576', 'HARINE AMALIA RAHMA', 2019);

-- HUBERTUS RINO AUGENIO
INSERT INTO users (id_roles, email, password) VALUES (2, 'hubertusrino@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '19/441226/SV/16578', 'HUBERTUS RINO AUGENIO', 2019);

-- MUHAMMAD RIFKI
INSERT INTO users (id_roles, email, password) VALUES (2, 'muri.rifki27@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '19/441230/SV/16582', 'MUHAMMAD RIFKI', 2019);

-- NANANG ARIFUDIN
INSERT INTO users (id_roles, email, password) VALUES (2, 'nanangarifudin@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '19/441232/SV/16584', 'NANANG ARIFUDIN', 2019);

-- RACHMA AURYA NURHALIZA
INSERT INTO users (id_roles, email, password) VALUES (2, 'rachmaaurya@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '19/441234/SV/16586', 'RACHMA AURYA NURHALIZA', 2019);

-- RISA MAHARDIKA SARI
INSERT INTO users (id_roles, email, password) VALUES (2, 'risamahardika89@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '19/441236/SV/16588', 'RISA MAHARDIKA SARI', 2019);

-- TAUFIK KEMAL THAHA
INSERT INTO users (id_roles, email, password) VALUES (2, 'taufik.k.t@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '19/441240/SV/16592', 'TAUFIK KEMAL THAHA', 2019);

-- ARIEF ZUHRI
INSERT INTO users (id_roles, email, password) VALUES (2, 'ariefzuhri@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '19/447131/SV/16850', 'ARIEF ZUHRI', 2019);

-- DHEVA DAYAT VITO INDRAJAKA
INSERT INTO users (id_roles, email, password) VALUES (2, 'dhevadayatvitoindraj@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '19/447133/SV/16852', 'DHEVA DAYAT VITO INDRAJAKA', 2019);

-- GABRIELA ANGGERITA JASMIN
INSERT INTO users (id_roles, email, password) VALUES (2, 'anggeritaj@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '19/447135/SV/16854', 'GABRIELA ANGGERITA JASMIN', 2019);

-- HENRIKUS WAHYU SETYOBUDIWAN
INSERT INTO users (id_roles, email, password) VALUES (2, 'henrikuswahyu007@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '19/447137/SV/16856', 'HENRIKUS WAHYU SETYOBUDIWAN', 2019);

-- MAZAYA SABRINA NURKHOLIK
INSERT INTO users (id_roles, email, password) VALUES (2, 'aya.nurkholik@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '19/447139/SV/16858', 'MAZAYA SABRINA NURKHOLIK', 2019);

-- MUHAMMAD AZRA FEBRIAN
INSERT INTO users (id_roles, email, password) VALUES (2, 'muhammadazra2019@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '19/447141/SV/16860', 'MUHAMMAD AZRA FEBRIAN', 2019);

-- MUHAMMAD INDRA ADHA
INSERT INTO users (id_roles, email, password) VALUES (2, 'amindraa05@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '19/447318/SV/17012', 'MUHAMMAD INDRA ADHA', 2019);

-- REYHAN MUHAMMAD FAUZAN
INSERT INTO users (id_roles, email, password) VALUES (2, 'reyhanmuhammad@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '19/447320/SV/17014', 'REYHAN MUHAMMAD FAUZAN', 2019);


-- // Angkatan 20
-- ALIEF RAHMAN HAKIM
INSERT INTO users (id_roles, email, password) VALUES (3, 'aliefrahman02@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '20/457255/SV/17702', 'ALIEF RAHMAN HAKIM', 2020);

-- ANGGRAINI DWIANSYAH
INSERT INTO users (id_roles, email, password) VALUES (3, 'anggraini.d@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '20/457257/SV/17704', 'ANGGRAINI DWIANSYAH', 2020);

-- ASIDIK AL JAFAR
INSERT INTO users (id_roles, email, password) VALUES (3, 'asidik.a.j@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '20/457258/SV/17705', 'ASIDIK AL JAFAR', 2020);

-- EKA SAMSIATI PUTRI
INSERT INTO users (id_roles, email, password) VALUES (3, 'ekasamsiati03@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '20/457259/SV/17706', 'EKA SAMSIATI PUTRI', 2020);

-- KEVIN AGUSTO SASTRAMIHARJA
INSERT INTO users (id_roles, email, password) VALUES (3, 'kevinagusto28@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '20/457263/SV/17710', 'KEVIN AGUSTO SASTRAMIHARJA', 2020);

-- MARISA DIAN PERTIWI
INSERT INTO users (id_roles, email, password) VALUES (3, 'marisa.d.p@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '20/457265/SV/17712', 'MARISA DIAN PERTIWI', 2020);

-- MUHAMAD AKBAR ABDUL KHOLIK
INSERT INTO users (id_roles, email, password) VALUES (3, 'muhamadakbar2020@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '20/457267/SV/17714', 'MUHAMAD AKBAR ABDUL KHOLIK', 2020);

-- MUHAMMAD YUSUF
INSERT INTO users (id_roles, email, password) VALUES (3, 'my070441@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '20/457270/SV/17717', 'MUHAMMAD YUSUF', 2020);

-- SRI WAHYU ADININGTYAS
INSERT INTO users (id_roles, email, password) VALUES (3, 'adiningtyas81@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '20/457272/SV/17719', 'SRI WAHYU ADININGTYAS', 2020);

-- AAQILAH HANNA QOONITAH
INSERT INTO users (id_roles, email, password) VALUES (3, 'aaqilahanna@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '20/464385/SV/18704', 'AAQILAH HANNA QOONITAH', 2020);

-- ANA SEMBAYUN
INSERT INTO users (id_roles, email, password) VALUES (3, 'anasembayun02@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '20/464386/SV/18705', 'ANA SEMBAYUN', 2020);

-- HAFIDH NURDIANSYAH
INSERT INTO users (id_roles, email, password) VALUES (3, 'hafidh.n@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '20/464391/SV/18710', 'HAFIDH NURDIANSYAH', 2020);

-- INAYATUNNISA FADHILA RISAHAR AKHSA
INSERT INTO users (id_roles, email, password) VALUES (3, 'inayatunnisa@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '20/464392/SV/18711', 'INAYATUNNISA FADHILA RISAHAR AKHSA', 2020);

-- IVON VIRGINIA PATALA
INSERT INTO users (id_roles, email, password) VALUES (3, 'ivon.v.p@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '20/464394/SV/18713', 'IVON VIRGINIA PATALA', 2020);

-- KARUNIAWAN EKASAKTI
INSERT INTO users (id_roles, email, password) VALUES (3, 'karuniawankaka80@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '20/464395/SV/18714', 'KARUNIAWAN EKASAKTI', 2020);

-- MUHAMMAD FAHRU ROZI
INSERT INTO users (id_roles, email, password) VALUES (3, 'muhammad.fahru.rozi@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '20/464396/SV/18715', 'MUHAMMAD FAHRU ROZI', 2020);

-- NANCY LAYLANA PUTRI
INSERT INTO users (id_roles, email, password) VALUES (3, 'nancy.laylana.putri@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '20/464399/SV/18718', 'NANCY LAYLANA PUTRI', 2020);

-- RAFID ASLAM
INSERT INTO users (id_roles, email, password) VALUES (3, 'rafidaslam@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '20/464402/SV/18721', 'RAFID ASLAM', 2020);

-- RAYHANTAMA HAIDAR RASYAD RAMADHAN
INSERT INTO users (id_roles, email, password) VALUES (3, 'rayhantama.sv@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '20/464404/SV/18723', 'RAYHANTAMA HAIDAR RASYAD RAMADHAN', 2020);

-- RADEN MAS TEJA NURSASONGKA
INSERT INTO users (id_roles, email, password) VALUES (3, 'tejaangki@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '20/464406/SV/18725', 'RADEN MAS TEJA NURSASONGKA', 2020);

-- ROSYIHAN MUHTADLOR
INSERT INTO users (id_roles, email, password) VALUES (3, 'rosihann14@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '20/464407/SV/18726', 'ROSYIHAN MUHTADLOR', 2020);

-- ZAHWA NEYSA AYALYA
INSERT INTO users (id_roles, email, password) VALUES (3, 'zahwa.neysa.a@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '20/464408/SV/18727', 'ZAHWA NEYSA AYALYA', 2020);

-- AFIFAH NUR LAILY
INSERT INTO users (id_roles, email, password) VALUES (3, 'afifah.n.l@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '20/457254/SV/17701', 'AFIFAH NUR LAILY', 2020);

-- KANTI ALIFA
INSERT INTO users (id_roles, email, password) VALUES (3, 'kantialf@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '20/457261/SV/17708', 'KANTI ALIFA', 2020);

-- LANA SAIFUL AQIL
INSERT INTO users (id_roles, email, password) VALUES (3, 'lana.saiful.aqil@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '20/457264/SV/17711', 'LANA SAIFUL AQIL', 2020);

-- MUHAMAD IHSAN NURIL ANWAR
INSERT INTO users (id_roles, email, password) VALUES (3, 'muhamadihsan2020@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '20/457268/SV/17715', 'MUHAMAD IHSAN NURIL ANWAR', 2020);

-- SALSABILA RISKIANI GUSTI PUTRI
INSERT INTO users (id_roles, email, password) VALUES (3, 'salsaputri407@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '20/457271/SV/17718', 'SALSABILA RISKIANI GUSTI PUTRI', 2020);

-- ANGELICA HAPPY GRECILIA SIDABUTAR
INSERT INTO users (id_roles, email, password) VALUES (3, 'angelica.sidabutar@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '20/464387/SV/18706', 'ANGELICA HAPPY GRECILIA SIDABUTAR', 2020);

-- ARTHAKA ARYASEENA
INSERT INTO users (id_roles, email, password) VALUES (3, 'arthaka46@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '20/464388/SV/18707', 'ARTHAKA ARYASEENA', 2020);

-- AVEENDA ZHAFIRA YASMIN
INSERT INTO users (id_roles, email, password) VALUES (3, 'zaveenda@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '20/464389/SV/18708', 'AVEENDA ZHAFIRA YASMIN', 2020);

-- FIRMANDA YAHYA SOFIANSYAH
INSERT INTO users (id_roles, email, password) VALUES (3, 'firmandayahya01@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '20/464390/SV/18709', 'FIRMANDA YAHYA SOFIANSYAH', 2020);

-- ISNANDA AGAFRILLA
INSERT INTO users (id_roles, email, password) VALUES (3, 'isnanda.a@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '20/464393/SV/18712', 'ISNANDA AGAFRILLA', 2020);

-- MUHAMMAD FATIH DARMAWAN
INSERT INTO users (id_roles, email, password) VALUES (3, 'muhammadfatihdarmawan@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '20/464397/SV/18716', 'MUHAMMAD FATIH DARMAWAN', 2020);

-- NAFISAH ANINDITHA FAHLEFI
INSERT INTO users (id_roles, email, password) VALUES (3, 'nafisahaninditha@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '20/464398/SV/18717', 'NAFISAH ANINDITHA FAHLEFI', 2020);

-- NIZAN DHIAULHAQ
INSERT INTO users (id_roles, email, password) VALUES (3, 'nizandhiaulhaq@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '20/464400/SV/18719', 'NIZAN DHIAULHAQ', 2020);

-- RAFA AHAMADA WIJAYA
INSERT INTO users (id_roles, email, password) VALUES (3, 'rafa.a.w@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '20/464401/SV/18720', 'RAFA AHAMADA WIJAYA', 2020);

-- RAMA ARISTA WIBISONO
INSERT INTO users (id_roles, email, password) VALUES (3, 'rama.arista.wibisono@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '20/464403/SV/18722', 'RAMA ARISTA WIBISONO', 2020);

-- RIVALDY ARIEF NUGRAHA
INSERT INTO users (id_roles, email, password) VALUES (3, 'rivaldyarief@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '20/464405/SV/18724', 'RIVALDY ARIEF NUGRAHA', 2020);


-- // Angkatan 21
-- Santi Widyastuti
INSERT INTO users (id_roles, email, password) VALUES (3, 'santi.widyastuti0603@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '21/473007/SV/18794', 'Santi Widyastuti', 2021);

-- YAHYA IDRIS ABDURRAHMAN
INSERT INTO users (id_roles, email, password) VALUES (3, 'yahya.idris.abdurrahman@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '21/473054/SV/18801', 'YAHYA IDRIS ABDURRAHMAN', 2021);

-- Anthonio Adley Putra Sasangka
INSERT INTO users (id_roles, email, password) VALUES (3, 'anthonio.adley1603@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '21/473203/SV/18815', 'Anthonio Adley Putra Sasangka', 2021);

-- FIKRI YURCEL MILANO
INSERT INTO users (id_roles, email, password) VALUES (3, 'fikri.yurcel.milano@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '21/473378/SV/18824', 'FIKRI YURCEL MILANO', 2021);

-- Vellya Riona
INSERT INTO users (id_roles, email, password) VALUES (3, 'vellya.riona@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '21/474420/SV/18916', 'Vellya Riona', 2021);

-- Ailsa Isnani Anubhawa
INSERT INTO users (id_roles, email, password) VALUES (3, 'ailsa.isn2003@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '21/474745/SV/19024', 'Ailsa Isnani Anubhawa', 2021);

-- HAFIZH FAVIAN SETIADHY PRATAMA
INSERT INTO users (id_roles, email, password) VALUES (3, 'hafizh.favian.setiadhy.pratama@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '21/477120/SV/19149', 'HAFIZH FAVIAN SETIADHY PRATAMA', 2021);

-- Niki Hidayati
INSERT INTO users (id_roles, email, password) VALUES (3, 'niki.hidayati@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '21/477478/SV/19186', 'Niki Hidayati', 2021);

-- Adiyatma Hilmy Kusuma Wijaya
INSERT INTO users (id_roles, email, password) VALUES (3, 'adiyatma.hilmy2802@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '21/478273/SV/19256', 'Adiyatma Hilmy Kusuma Wijaya', 2021);

-- Nauval Pradipta
INSERT INTO users (id_roles, email, password) VALUES (3, 'nauval.pradipta@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '21/478509/SV/19322', 'Nauval Pradipta', 2021);

-- Radivan Alan Nouruzzaman
INSERT INTO users (id_roles, email, password) VALUES (3, 'muhammad.luthfi2003@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '21/478529/SV/19331', 'Radivan Alan Nouruzzaman', 2021);

-- Muhammad Luthfi Azzahra Rammadhani
INSERT INTO users (id_roles, email, password) VALUES (3, 'aliif.arief.maulana@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '21/478530/SV/19332', 'Muhammad Luthfi Azzahra Rammadhani', 2021);

-- Aliif Arief Maulana
INSERT INTO users (id_roles, email, password) VALUES (3, 'ridha.fauziyya.rahma@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '21/479029/SV/19418', 'Aliif Arief Maulana', 2021);

-- Ridha Fauziyya Rahma
INSERT INTO users (id_roles, email, password) VALUES (3, 'aprilia.khoirunnisa@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '21/479064/SV/19426', 'Ridha Fauziyya Rahma', 2021);

-- AKBAR FAJAR RAMADHAN
INSERT INTO users (id_roles, email, password) VALUES (3, 'akbar.fajar2301@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '21/479890/SV/19543', 'AKBAR FAJAR RAMADHAN', 2021);

-- Rahul Rahmatullah
INSERT INTO users (id_roles, email, password) VALUES (3, 'rahul.rahmatullah@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '21/480280/SV/19603', 'Rahul Rahmatullah', 2021);

-- Anggito Wicaksono
INSERT INTO users (id_roles, email, password) VALUES (3, 'anggito.wicaksono@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '21/480402/SV/19629', 'Anggito Wicaksono', 2021);

-- Fairuz Akbar Azaria
INSERT INTO users (id_roles, email, password) VALUES (3, 'fairuz.akbar.azaria@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '21/480632/SV/19670', 'Fairuz Akbar Azaria', 2021);

-- Christophorus Ardhito Haryo Dwinanda
INSERT INTO users (id_roles, email, password) VALUES (3, 'christophorus.ardhito0301@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '21/480721/SV/19683', 'Christophorus Ardhito Haryo Dwinanda', 2021);

-- Rayendra Arya Daneswara
INSERT INTO users (id_roles, email, password) VALUES (3, 'rayendra.arya.daneswara@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '21/481217/SV/19745', 'Rayendra Arya Daneswara', 2021);

-- Irfan Fauzi
INSERT INTO users (id_roles, email, password) VALUES (3, 'irfan.fauzi@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '21/482537/SV/19959', 'Irfan Fauzi', 2021);

-- Muhammad Naufal Rosyad
INSERT INTO users (id_roles, email, password) VALUES (3, 'muhammad.naufal2803@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '21/482956/SV/20025', 'Muhammad Naufal Rosyad', 2021);

-- FACHRISA MEIVITO ADINZA
INSERT INTO users (id_roles, email, password) VALUES (3, 'fachrisa.meivito0703@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '21/483132/SV/20088', 'FACHRISA MEIVITO ADINZA', 2021);

-- Rakhmad Hernan Syah
INSERT INTO users (id_roles, email, password) VALUES (3, 'rakhmad.hernan.syah@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '21/483217/SV/20116', 'Rakhmad Hernan Syah', 2021);

-- Gisfa Putra Ryangga
INSERT INTO users (id_roles, email, password) VALUES (3, 'gisfa.putra2603@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '21/473019/SV/18796', 'Gisfa Putra Ryangga', 2021);

-- Shavana Afieza Alif
INSERT INTO users (id_roles, email, password) VALUES (3, 'shavana.afieza.alif@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '21/473057/SV/18803', 'Shavana Afieza Alif', 2021);

-- NINIS DYAH YULIANINGSIH
INSERT INTO users (id_roles, email, password) VALUES (3, 'ninis.dyah.yulianingsih@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '21/473295/SV/18820', 'NINIS DYAH YULIANINGSIH', 2021);

-- REVANDRA ARYO DWI KRISNANDARU
INSERT INTO users (id_roles, email, password) VALUES (3, 'revandra.aryo.dwi.krisnandaru@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '21/474008/SV/18869', 'REVANDRA ARYO DWI KRISNANDARU', 2021);

-- Luthfia Nisa Azzahra
INSERT INTO users (id_roles, email, password) VALUES (3, 'luthfia.nisa2703@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '21/474456/SV/18930', 'Luthfia Nisa Azzahra', 2021);

-- Zafna Khairunnisa
INSERT INTO users (id_roles, email, password) VALUES (3, 'zafna.khairunnisa@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '21/477082/SV/19146', 'Zafna Khairunnisa', 2021);

-- ALYA ZAKHIRA ANJANI
INSERT INTO users (id_roles, email, password) VALUES (3, 'alya.zak2002@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '21/477181/SV/19156', 'ALYA ZAKHIRA ANJANI', 2021);

-- Ahmad Fatha Mumtaza
INSERT INTO users (id_roles, email, password) VALUES (3, 'ahmad.fatha1502@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '21/477537/SV/19195', 'Ahmad Fatha Mumtaza', 2021);

-- Gabriel Rio Aditya
INSERT INTO users (id_roles, email, password) VALUES (3, 'gabriel.rio.aditya@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '21/478384/SV/19282', 'Gabriel Rio Aditya', 2021);

-- melani putri pratama
INSERT INTO users (id_roles, email, password) VALUES (3, 'melani.putri.pratama@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '21/479409/SV/19498', 'melani putri pratama', 2021);

-- Vas Artiana
INSERT INTO users (id_roles, email, password) VALUES (3, 'vas.artiana1003@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '21/480145/SV/19578', 'Vas Artiana', 2021);

-- Rengganis Wahyuaning Putri
INSERT INTO users (id_roles, email, password) VALUES (3, 'rengganis.wahyuaning.putri@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '21/480288/SV/19605', 'Rengganis Wahyuaning Putri', 2021);

-- Salwa Aurellia Nuza
INSERT INTO users (id_roles, email, password) VALUES (3, 'salwa.aur2003@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '21/480418/SV/19634', 'Salwa Aurellia Nuza', 2021);

-- ANDHIKA RAHMANU
INSERT INTO users (id_roles, email, password) VALUES (3, 'andhika.rahmanu@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '21/480664/SV/19673', 'ANDHIKA RAHMANU', 2021);

-- Lintang Yandi Nugraha
INSERT INTO users (id_roles, email, password) VALUES (3, 'lintang.yandi.nugraha@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '21/480971/SV/19714', 'Lintang Yandi Nugraha', 2021);

-- Herjati Aji
INSERT INTO users (id_roles, email, password) VALUES (3, 'herjati.aji@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '21/481344/SV/19758', 'Herjati Aji', 2021);

-- Adika Dwi Saputra
INSERT INTO users (id_roles, email, password) VALUES (3, 'adika.dwi.saputra@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '21/482328/SV/19922', 'Adika Dwi Saputra', 2021);

-- Farhan Akmal Shaleh
INSERT INTO users (id_roles, email, password) VALUES (3, 'farhanakmalshaleh482851@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '21/482851/SV/20006', 'Farhan Akmal Shaleh', 2021);

-- ELYRA DINA OKTAVIANI
INSERT INTO users (id_roles, email, password) VALUES (3, 'elyra.dina1903@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '21/483010/SV/20044', 'ELYRA DINA OKTAVIANI', 2021);

-- Antonius Krisargo Wisnuaji Nugroho
INSERT INTO users (id_roles, email, password) VALUES (3, 'antonius.kri2003@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '21/483169/SV/20106', 'Antonius Krisargo Wisnuaji Nugroho', 2021);

-- Budi Sugiarto
INSERT INTO users (id_roles, email, password) VALUES (3, 'budisugiarto@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '21/483388/SV/20190', 'Budi Sugiarto', 2021);


-- // Angkatan 22
-- May Clean Sitepu
INSERT INTO users (id_roles, email, password) VALUES (3, 'maycleansitepu0204@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '22/492444/SV/20500', 'May Clean Sitepu', 2022);

-- Aprilia Wulandari
INSERT INTO users (id_roles, email, password) VALUES (3, 'apriliawulandari@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '22/492464/SV/20508', 'Aprilia Wulandari', 2022);

-- Tamara Sashikirana
INSERT INTO users (id_roles, email, password) VALUES (3, 'tamarasashikirana@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '22/492515/SV/20528', 'Tamara Sashikirana', 2022);

-- Aisa Selvira
INSERT INTO users (id_roles, email, password) VALUES (3, 'aisaselvira@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '22/492559/SV/20554', 'Aisa Selvira', 2022);

-- Arelia Maia Ashary
INSERT INTO users (id_roles, email, password) VALUES (3, 'areliamaiaashary0904@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '22/492561/SV/20555', 'Arelia Maia Ashary', 2022);

-- Praneta Dwi Indarti
INSERT INTO users (id_roles, email, password) VALUES (3, 'pranetadwiindarti2004@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '22/492579/SV/20564', 'Praneta Dwi Indarti', 2022);

-- Rioga Natayudha
INSERT INTO users (id_roles, email, password) VALUES (3, 'rioganatayudha0103@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '22/492589/SV/20569', 'Rioga Natayudha', 2022);

-- Rizky Oktarinanto
INSERT INTO users (id_roles, email, password) VALUES (3, 'rizkyoktarinanto@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '22/492596/SV/20573', 'Rizky Oktarinanto', 2022);

-- Ananda Kusuma Putri
INSERT INTO users (id_roles, email, password) VALUES (3, 'anandakusumaputri2604@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '22/492615/SV/20585', 'Ananda Kusuma Putri', 2022);

-- ANISA BERLIANI PUTRI SALSABILA
INSERT INTO users (id_roles, email, password) VALUES (3, 'anisaberlianiputrisalsabila2004@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '22/492623/SV/20589', 'ANISA BERLIANI PUTRI SALSABILA', 2022);

-- Annisa Urohmah
INSERT INTO users (id_roles, email, password) VALUES (3, 'annisaurohmah@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '22/497807/SV/21164', 'Annisa Urohmah', 2022);

-- Alamsyah Aldefa Putra
INSERT INTO users (id_roles, email, password) VALUES (3, 'alamsyahaldefaputra@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '22/498313/SV/21203', 'Alamsyah Aldefa Putra', 2022);

-- Muhammad Syuja Rizqullah
INSERT INTO users (id_roles, email, password) VALUES (3, 'muhammadsyujarizqullah@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '22/498397/SV/21209', 'Muhammad Syuja Rizqullah', 2022);

-- Devrangga Hazza Mahiswara
INSERT INTO users (id_roles, email, password) VALUES (3, 'devranggahazzamahiswara@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '22/498430/SV/21212', 'Devrangga Hazza Mahiswara', 2022);

-- Saidil Halim
INSERT INTO users (id_roles, email, password) VALUES (3, 'saidilhalim@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '22/498691/SV/21241', 'Saidil Halim', 2022);

-- Raihan Alfian Pratama
INSERT INTO users (id_roles, email, password) VALUES (3, 'raihanalfianpratama2004@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '22/498752/SV/21253', 'Raihan Alfian Pratama', 2022);

-- Maria Azalea Nareswari
INSERT INTO users (id_roles, email, password) VALUES (3, 'mariaazaleanareswari@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '22/498753/SV/21254', 'Maria Azalea Nareswari', 2022);

-- Raditya Putri Angelita
INSERT INTO users (id_roles, email, password) VALUES (3, 'radityaputriangelita@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '22/498768/SV/21259', 'Raditya Putri Angelita', 2022);

-- Syifa Hanabila
INSERT INTO users (id_roles, email, password) VALUES (3, 'syifahanabila@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '22/498928/SV/21276', 'Syifa Hanabila', 2022);

-- Fayyadh Arrazan Miftakhul
INSERT INTO users (id_roles, email, password) VALUES (3, 'fayyadharrazanmiftakhul@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '22/498972/SV/21278', 'Fayyadh Arrazan Miftakhul', 2022);

-- Arviansyah Eka Pasyutra Kaerumantana
INSERT INTO users (id_roles, email, password) VALUES (3, 'arviansyahekapasyutrakaerumantana@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '22/503980/SV/21565', 'Arviansyah Eka Pasyutra Kaerumantana', 2022);

-- Pudyasta Satria Pinandhita
INSERT INTO users (id_roles, email, password) VALUES (3, 'pudyastasatriapinandhita@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '22/504005/SV/21570', 'Pudyasta Satria Pinandhita', 2022);

-- Ilham Rafi Mahameru
INSERT INTO users (id_roles, email, password) VALUES (3, 'ilhamrafimahameru2004@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '22/504071/SV/21580', 'Ilham Rafi Mahameru', 2022);

-- Muhammad Harits Detya Irawan
INSERT INTO users (id_roles, email, password) VALUES (3, 'muhammadharitsdetyairawan2004@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '22/504159/SV/21598', 'Muhammad Harits Detya Irawan', 2022);

-- Rifa Indra Setiawan
INSERT INTO users (id_roles, email, password) VALUES (3, 'rifaindrasetiawan@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '22/504193/SV/21607', 'Rifa Indra Setiawan', 2022);

-- Dzaki Achmad Abimanyu
INSERT INTO users (id_roles, email, password) VALUES (3, 'dzakiachmadabimanyu2004@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '22/504313/SV/21625', 'Dzaki Achmad Abimanyu', 2022);

-- Ahmad Syauqi Taqiyuddin
INSERT INTO users (id_roles, email, password) VALUES (3, 'ahmadsyauqitaqiyuddin2004@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '22/504457/SV/21643', 'Ahmad Syauqi Taqiyuddin', 2022);

-- Shaffina Dewi Herliany
INSERT INTO users (id_roles, email, password) VALUES (3, 'shaffinadewiherliany@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '22/492715/SV/20605', 'Shaffina Dewi Herliany', 2022);

-- SHYRA ATHAYA
INSERT INTO users (id_roles, email, password) VALUES (3, 'shyraathaya@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '22/492988/SV/20641', 'SHYRA ATHAYA', 2022);

-- ANDROMEDHA CYNOSURA
INSERT INTO users (id_roles, email, password) VALUES (3, 'andromedhacynosura@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '22/493038/SV/20654', 'ANDROMEDHA CYNOSURA', 2022);

-- Anisah Salma Rafida
INSERT INTO users (id_roles, email, password) VALUES (3, 'anisahsalmarafida@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '22/493059/SV/20657', 'Anisah Salma Rafida', 2022);

-- Agustina Bayu Pramesti
INSERT INTO users (id_roles, email, password) VALUES (3, 'agustinabayupramesti@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '22/493307/SV/20686', 'Agustina Bayu Pramesti', 2022);

-- MARITZA ANGELINA AZ ZAHRA
INSERT INTO users (id_roles, email, password) VALUES (3, 'maritzaangelinaazzahra@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '22/493646/SV/20718', 'MARITZA ANGELINA AZ ZAHRA', 2022);

-- Innaiya Azkiya H
INSERT INTO users (id_roles, email, password) VALUES (3, 'innaiyaazkiyah@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '22/496809/SV/21013', 'Innaiya Azkiya H', 2022);

-- Fajar Wahyu Nugroho
INSERT INTO users (id_roles, email, password) VALUES (3, 'fajarwahyunugroho0802@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '22/496831/SV/21022', 'Fajar Wahyu Nugroho', 2022);

-- Muhammad Fadhillah Suryo Atmojo
INSERT INTO users (id_roles, email, password) VALUES (3, 'muhammadfadhillahsuryoatmojo@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '22/496882/SV/21040', 'Muhammad Fadhillah Suryo Atmojo', 2022);

-- Sandi Aji Pamungkas
INSERT INTO users (id_roles, email, password) VALUES (3, 'sandiajipamungkas0303@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '22/497711/SV/21155', 'Sandi Aji Pamungkas', 2022);

-- Tantowi Shah Hanif
INSERT INTO users (id_roles, email, password) VALUES (3, 'tantowishahhanif@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '22/502562/SV/21429', 'Tantowi Shah Hanif', 2022);

-- Miftah Sabirah
INSERT INTO users (id_roles, email, password) VALUES (3, 'miftahsabirah@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '22/502696/SV/21436', 'Miftah Sabirah', 2022);

-- Ghifari Raya Ammarkahfi
INSERT INTO users (id_roles, email, password) VALUES (3, 'ghifarirayaammarkahfi@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '22/502975/SV/21460', 'Ghifari Raya Ammarkahfi', 2022);

-- HUDA MUHAMMAD NUR
INSERT INTO users (id_roles, email, password) VALUES (3, 'hudamuhammadnur@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '22/503298/SV/21491', 'HUDA MUHAMMAD NUR', 2022);

-- Muhammad Muflih Raihan
INSERT INTO users (id_roles, email, password) VALUES (3, 'muhammadmuflihraihan2004@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '22/503413/SV/21502', 'Muhammad Muflih Raihan', 2022);

-- Verlino Raya Fajri
INSERT INTO users (id_roles, email, password) VALUES (3, 'verlinorayafajri@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '22/503541/SV/21515', 'Verlino Raya Fajri', 2022);

-- Yudhistira Rafazaky Bandono
INSERT INTO users (id_roles, email, password) VALUES (3, 'yudhistirarafazakyba@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '22/503572/SV/21518', 'Yudhistira Rafazaky Bandono', 2022);

-- ALIF RIZQULLAH MA''RUF
INSERT INTO users (id_roles, email, password) VALUES (3, 'alifrizqullahmaruf2003@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '22/503619/SV/21522', 'ALIF RIZQULLAH MA''RUF', 2022);

-- Charizza Thunjung Sukmana Putra
INSERT INTO users (id_roles, email, password) VALUES (3, 'charizzathunjungsukmanaputra@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '22/503754/SV/21537', 'Charizza Thunjung Sukmana Putra', 2022);

-- Ikhwan Hanif Firdaus
INSERT INTO users (id_roles, email, password) VALUES (3, 'ikhwanhaniffirdaus@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '22/503872/SV/21552', 'Ikhwan Hanif Firdaus', 2022);

-- Nadia Eka Febrianti
INSERT INTO users (id_roles, email, password) VALUES (3, 'nadiaekafebrianti@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '22/504517/SV/21652', 'Nadia Eka Febrianti', 2022);

-- ADY PETRUS SARAGIH
INSERT INTO users (id_roles, email, password) VALUES (3, 'adypetrussaragih@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '22/504542/SV/21657', 'ADY PETRUS SARAGIH', 2022);

-- NAUFAL TRI SUBAKTI
INSERT INTO users (id_roles, email, password) VALUES (3, 'naufaltrisubakti2003@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '22/504557/SV/21659', 'NAUFAL TRI SUBAKTI', 2022);

-- Daffa Askar Fathin
INSERT INTO users (id_roles, email, password) VALUES (3, 'daffaaskarfathin@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '22/504665/SV/21675', 'Daffa Askar Fathin', 2022);

-- NUR MUHAMMAD KAFABIH
INSERT INTO users (id_roles, email, password) VALUES (3, 'nurmuhammadkafabih2003@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '22/504682/SV/21682', 'NUR MUHAMMAD KAFABIH', 2022);

-- Resanti Dwi Cahyani
INSERT INTO users (id_roles, email, password) VALUES (3, 'resantidwicahyani@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '22/504800/SV/21709', 'Resanti Dwi Cahyani', 2022);

-- Maulana Fikrie Rizaldi
INSERT INTO users (id_roles, email, password) VALUES (3, 'maulanafikrierizaldi2003@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '22/493719/SV/20726', 'Maulana Fikrie Rizaldi', 2022);

-- Dwi Agung Febriyanto
INSERT INTO users (id_roles, email, password) VALUES (3, 'dwiagungfebriyanto@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '22/493887/SV/20746', 'Dwi Agung Febriyanto', 2022);

-- Prasetyo Edi Pamungkas
INSERT INTO users (id_roles, email, password) VALUES (3, 'prasetyoedipamungkas2002@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '22/493905/SV/20749', 'Prasetyo Edi Pamungkas', 2022);

-- Erlangga Syifa Sutrisno
INSERT INTO users (id_roles, email, password) VALUES (3, 'erlanggasyifasutrisno@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '22/493922/SV/20754', 'Erlangga Syifa Sutrisno', 2022);

-- Ashila Najla Salsabilla WD
INSERT INTO users (id_roles, email, password) VALUES (3, 'ashilanajlasalsabillawd@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '22/493981/SV/20767', 'Ashila Najla Salsabilla WD', 2022);

-- Salma Nur Azizah
INSERT INTO users (id_roles, email, password) VALUES (3, 'salmanurazizah@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '22/494348/SV/20795', 'Salma Nur Azizah', 2022);

-- Darriel Markerizal
INSERT INTO users (id_roles, email, password) VALUES (3, 'darrielmarkerizal@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '22/494409/SV/20806', 'Darriel Markerizal', 2022);

-- KINANTHY CAHYANINGRUM
INSERT INTO users (id_roles, email, password) VALUES (3, 'kinanthycahyaningrum@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '22/494423/SV/20815', 'KINANTHY CAHYANINGRUM', 2022);

-- Aminah Nurul Huda
INSERT INTO users (id_roles, email, password) VALUES (3, 'aminahnurulhuda@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '22/494455/SV/20830', 'Aminah Nurul Huda', 2022);

-- Hassan Aldhi Wirawan
INSERT INTO users (id_roles, email, password) VALUES (3, 'hassanaldhiwirawan@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '22/494490/SV/20845', 'Hassan Aldhi Wirawan', 2022);

-- Fairly Ardasa
INSERT INTO users (id_roles, email, password) VALUES (3, 'fairlyardasa@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '22/499475/SV/21331', 'Fairly Ardasa', 2022);

-- Viko Rivanesta
INSERT INTO users (id_roles, email, password) VALUES (3, 'vikorivanesta@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '22/499510/SV/21336', 'Viko Rivanesta', 2022);

-- Andhika Yoga Pratama
INSERT INTO users (id_roles, email, password) VALUES (3, 'andhikayogapratama@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '22/499593/SV/21342', 'Andhika Yoga Pratama', 2022);

-- AMANDA FARLIANA SETYASARI
INSERT INTO users (id_roles, email, password) VALUES (3, 'amandafarlianasetyasari@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '22/499652/SV/21353', 'AMANDA FARLIANA SETYASARI', 2022);

-- Akhmad Maulana Akhsan
INSERT INTO users (id_roles, email, password) VALUES (3, 'akhmadmaulanaakhsan@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '22/499991/SV/21383', 'Akhmad Maulana Akhsan', 2022);

-- Adiel Boanerge Gananputra
INSERT INTO users (id_roles, email, password) VALUES (3, 'adielboanergegananputra@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '22/500051/SV/21386', 'Adiel Boanerge Gananputra', 2022);

-- Isan Faizun Hidar
INSERT INTO users (id_roles, email, password) VALUES (3, 'isan.faizun.hidar@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '22/500411/SV/21417', 'Isan Faizun Hidar', 2022);

-- Langit Lintang Radjendra
INSERT INTO users (id_roles, email, password) VALUES (3, 'langitlintangradjendra@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '22/501269/SV/21425', 'Langit Lintang Radjendra', 2022);

-- FARHAN HANIF
INSERT INTO users (id_roles, email, password) VALUES (3, 'farhanhanif@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '22/504834/SV/21715', 'FARHAN HANIF', 2022);

-- Salwa Jasmine A`aliyah
INSERT INTO users (id_roles, email, password) VALUES (3, 'salwajasmineaaliyah2004@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '22/504947/SV/21732', 'Salwa Jasmine A`aliyah', 2022);

-- Sena Aji Bayu Murti
INSERT INTO users (id_roles, email, password) VALUES (3, 'senaajibayumurti@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '22/505018/SV/21751', 'Sena Aji Bayu Murti', 2022);

-- Zefanya Diego Forlandicco
INSERT INTO users (id_roles, email, password) VALUES (3, 'zefanyadiegoforlandi@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '22/505523/SV/21815', 'Zefanya Diego Forlandicco', 2022);

-- Muhammad Farhan Nugroho
INSERT INTO users (id_roles, email, password) VALUES (3, 'muhammadfarhannugroho@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '22/505586/SV/21824', 'Muhammad Farhan Nugroho', 2022);

-- Nawal Rizky Kautsar
INSERT INTO users (id_roles, email, password) VALUES (3, 'nawalrizkykautsar@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '22/505597/SV/21827', 'Nawal Rizky Kautsar', 2022);

-- DRAGAN ABRISAM WIDIJANTO
INSERT INTO users (id_roles, email, password) VALUES (3, 'draganabrisamwidijanto@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '22/505608/SV/21834', 'DRAGAN ABRISAM WIDIJANTO', 2022);

-- Risma Saputri
INSERT INTO users (id_roles, email, password) VALUES (3, 'rismasaputri@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '22/505613/SV/21835', 'Risma Saputri', 2022);

-- Yodhimas Geffananda
INSERT INTO users (id_roles, email, password) VALUES (3, 'yodhimasgeffananda@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '22/494737/SV/20902', 'Yodhimas Geffananda', 2022);

-- MUHAMMAD HANIF SAUQI
INSERT INTO users (id_roles, email, password) VALUES (3, 'muhammadhanifsauqi2004@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '22/495097/SV/20949', 'MUHAMMAD HANIF SAUQI', 2022);

-- Afra Cendekia Putri Jallil
INSERT INTO users (id_roles, email, password) VALUES (3, 'afracendekiaputrijallil2604@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '22/496428/SV/20957', 'Afra Cendekia Putri Jallil', 2022);

-- Ghita Najmi Naqasy
INSERT INTO users (id_roles, email, password) VALUES (3, 'ghitanajminaqasy0304@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '22/496466/SV/20961', 'Ghita Najmi Naqasy', 2022);

-- BIMA BAYU SOFANA
INSERT INTO users (id_roles, email, password) VALUES (3, 'bimabayusofana@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '22/496548/SV/20977', 'BIMA BAYU SOFANA', 2022);

-- Muhammad Haikal Adityo
INSERT INTO users (id_roles, email, password) VALUES (3, 'muhammadhaikaladityo@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '22/499338/SV/21304', 'Muhammad Haikal Adityo', 2022);

-- Ananda Hirzi Thirafi
INSERT INTO users (id_roles, email, password) VALUES (3, 'anandahirzithirafi@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '22/499356/SV/21306', 'Ananda Hirzi Thirafi', 2022);

-- Ryvalino Dhanu Ekaputra
INSERT INTO users (id_roles, email, password) VALUES (3, 'ryvalinodhanuekaputra@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '22/499364/SV/21310', 'Ryvalino Dhanu Ekaputra', 2022);

-- Naufal Manaf
INSERT INTO users (id_roles, email, password) VALUES (3, 'naufalmanaf2004@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '22/499370/SV/21312', 'Naufal Manaf', 2022);

-- Muhammad Rizky Aziz
INSERT INTO users (id_roles, email, password) VALUES (3, 'muhammadrizkyaziz1404@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '22/499420/SV/21321', 'Muhammad Rizky Aziz', 2022);

-- Tsania Qurrota A''yunin Qulub
INSERT INTO users (id_roles, email, password) VALUES (3, 'tsaniaqurrotaayuninqulub@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '22/505618/SV/21839', 'Tsania Qurrota A''yunin Qulub', 2022);

-- Hayya Fatihatuz Zahra
INSERT INTO users (id_roles, email, password) VALUES (3, 'hayyafatihatuzzahra@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '22/505619/SV/21840', 'Hayya Fatihatuz Zahra', 2022);

-- Aldy Ardiansyah
INSERT INTO users (id_roles, email, password) VALUES (3, 'aldyardiansyah@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '22/505624/SV/21845', 'Aldy Ardiansyah', 2022);

-- Tri Rambu Nugroho Prasetyo
INSERT INTO users (id_roles, email, password) VALUES (3, 'trirambunugrohoprasetyo@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '22/505631/SV/21850', 'Tri Rambu Nugroho Prasetyo', 2022);

-- Fadhila Ain Salsabilla
INSERT INTO users (id_roles, email, password) VALUES (3, 'fadhilaainsalsabilla@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '22/505661/SV/21864', 'Fadhila Ain Salsabilla', 2022);

-- Wildan Dzaky Ramadhani
INSERT INTO users (id_roles, email, password) VALUES (3, 'wildandzakyramadhani@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '22/505766/SV/21917', 'Wildan Dzaky Ramadhani', 2022);

-- Mahendra Yuda Pradana
INSERT INTO users (id_roles, email, password) VALUES (3, 'mahendrayudapradana@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '22/505782/SV/21928', 'Mahendra Yuda Pradana', 2022);

-- Rasyid Kusnady
INSERT INTO users (id_roles, email, password) VALUES (3, 'rasyidkusnady@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '22/505791/SV/21936', 'Rasyid Kusnady', 2022);

-- ROBERTUS DIMAS SENA KUSUMA
INSERT INTO users (id_roles, email, password) VALUES (3, 'robertusdimassenakusuma2003@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '22/505925/SV/21997', 'ROBERTUS DIMAS SENA KUSUMA', 2022);

-- Lutfi Lisana Shidqi
INSERT INTO users (id_roles, email, password) VALUES (3, 'lutfilisanashidqi@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '22/505926/SV/21998', 'Lutfi Lisana Shidqi', 2022);

-- La Ode Naufal Hafiz Allaudin
INSERT INTO users (id_roles, email, password) VALUES (3, 'laodenaufalhafizallaudin@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '22/506011/SV/22034', 'La Ode Naufal Hafiz Allaudin', 2022);

-- Muhammad Abyan Farras Yusuf
INSERT INTO users (id_roles, email, password) VALUES (3, 'muhammadabyanfarrasyusuf@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '22/506156/SV/22088', 'Muhammad Abyan Farras Yusuf', 2022);

-- AJENG CERELIA EVIN
INSERT INTO users (id_roles, email, password) VALUES (3, 'ajengcereliaevin@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '22/506178/SV/22102', 'AJENG CERELIA EVIN', 2022);

-- Marwah Kamila Ahmad
INSERT INTO users (id_roles, email, password) VALUES (3, 'marwahkamilaahmad@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '22/506193/SV/22109', 'Marwah Kamila Ahmad', 2022);


-- // Angkatan 23
-- Azzuro Najma Annaila
INSERT INTO users (id_roles, email, password) VALUES (3, 'azzuronajmaannaila@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '23/511930/SV/22116', 'Azzuro Najma Annaila', 2023);

-- Salis Haidar Luthfi
INSERT INTO users (id_roles, email, password) VALUES (3, 'salishaidarluthfi@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '23/513525/SV/22227', 'Salis Haidar Luthfi', 2023);

-- Husna Felisa Cahyani
INSERT INTO users (id_roles, email, password) VALUES (3, 'husnafelisacahyani@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '23/513540/SV/22232', 'Husna Felisa Cahyani', 2023);

-- Ahmad Luthfi'' Abdillah
INSERT INTO users (id_roles, email, password) VALUES (3, 'ahmadluthfiabdillah@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '23/514443/SV/22349', 'Ahmad Luthfi'' Abdillah', 2023);

-- Najmina Kinanti Putri
INSERT INTO users (id_roles, email, password) VALUES (3, 'najminakinantiputri@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '23/514821/SV/22432', 'Najmina Kinanti Putri', 2023);

-- Dimal Karim Ahmad
INSERT INTO users (id_roles, email, password) VALUES (3, 'dimalkarimahmad@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '23/515174/SV/22489', 'Dimal Karim Ahmad', 2023);

-- Annisa Mutia Rahman
INSERT INTO users (id_roles, email, password) VALUES (3, 'annisamutiarahman@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '23/515441/SV/22547', 'Annisa Mutia Rahman', 2023);

-- Asyifa Dzaky Maulana Aditria
INSERT INTO users (id_roles, email, password) VALUES (3, 'asyifadzakymaulanaaditria@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '23/515724/SV/22606', 'Asyifa Dzaky Maulana Aditria', 2023);

-- Samuel Ardian Valentino Silaban
INSERT INTO users (id_roles, email, password) VALUES (3, 'samuelardianvalentinosilaban@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '23/516727/SV/22705', 'Samuel Ardian Valentino Silaban', 2023);

-- Edeline Felicia Dharmawan
INSERT INTO users (id_roles, email, password) VALUES (3, 'edelinefeliciadharmawan@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '23/516737/SV/22707', 'Edeline Felicia Dharmawan', 2023);

-- Dwi Anggara Najwan Sugama
INSERT INTO users (id_roles, email, password) VALUES (3, 'dwianggaranajwansugama@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '23/517178/SV/22744', 'Dwi Anggara Najwan Sugama', 2023);

-- Isa Muhammad
INSERT INTO users (id_roles, email, password) VALUES (3, 'isamuhammad@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '23/517349/SV/22761', 'Isa Muhammad', 2023);

-- Naufal Abyu Nafi
INSERT INTO users (id_roles, email, password) VALUES (3, 'naufalabyunafi2005@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '23/517786/SV/22829', 'Naufal Abyu Nafi', 2023);

-- Nino Auliya Nahara
INSERT INTO users (id_roles, email, password) VALUES (3, 'ninoauliyanahara@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '23/518267/SV/22937', 'Nino Auliya Nahara', 2023);

-- Muhammad Krisvananta Muflih Afif
INSERT INTO users (id_roles, email, password) VALUES (3, 'muhammadkrisvanantamuflihafif@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '23/519589/SV/23153', 'Muhammad Krisvananta Muflih Afif', 2023);

-- Belda Putri Pramono
INSERT INTO users (id_roles, email, password) VALUES (3, 'beldaputripramono@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '23/519672/SV/23161', 'Belda Putri Pramono', 2023);

-- MUHAMMAD ARIF RIZKY PRATAMA
INSERT INTO users (id_roles, email, password) VALUES (3, 'muhammadarifrizkypratama2004@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '23/520060/SV/23204', 'MUHAMMAD ARIF RIZKY PRATAMA', 2023);

-- MUHAMAD FAHRUL RAZI
INSERT INTO users (id_roles, email, password) VALUES (3, 'muhamadfahrulrazi@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '23/520489/SV/23247', 'MUHAMAD FAHRUL RAZI', 2023);

-- Fauzi Setiawan
INSERT INTO users (id_roles, email, password) VALUES (3, 'fauzisetiawan2003@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '23/520505/SV/23251', 'Fauzi Setiawan', 2023);

-- SYAHLA NAIIMAH
INSERT INTO users (id_roles, email, password) VALUES (3, 'syahlanaiimah2004@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '23/520864/SV/23313', 'SYAHLA NAIIMAH', 2023);

-- REZA LUTHFI AKBAR
INSERT INTO users (id_roles, email, password) VALUES (3, 'rezaluthfiakbar@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '23/522048/SV/23578', 'REZA LUTHFI AKBAR', 2023);

-- Ezra Bariq Rizqullah
INSERT INTO users (id_roles, email, password) VALUES (3, 'ezrabariqrizqullah2005@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '23/522051/SV/23579', 'Ezra Bariq Rizqullah', 2023);

-- Ezra Abhinaya Pasaribu
INSERT INTO users (id_roles, email, password) VALUES (3, 'ezraabhinayapasaribu2004@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '23/522200/SV/23627', 'Ezra Abhinaya Pasaribu', 2023);

-- Wahhab Awaludin
INSERT INTO users (id_roles, email, password) VALUES (3, 'wahhabawaludin2004@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '23/522216/SV/23632', 'Wahhab Awaludin', 2023);

-- Kamaluddin Arsyad Fadllillah
INSERT INTO users (id_roles, email, password) VALUES (3, 'kamaluddinarsyadfadllillah@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '23/522531/SV/23715', 'Kamaluddin Arsyad Fadllillah', 2023);

-- YUSUF CATUR SAPUTRO
INSERT INTO users (id_roles, email, password) VALUES (3, 'yusufcatursaputro@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '23/523202/SV/23870', 'YUSUF CATUR SAPUTRO', 2023);

-- Arga Adinata Athallah Pahlevi
INSERT INTO users (id_roles, email, password) VALUES (3, 'argaadinataathallahp@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '23/514333/SV/22320', 'Arga Adinata Athallah Pahlevi', 2023);

-- Muhamad Robbi Firmansyah
INSERT INTO users (id_roles, email, password) VALUES (3, 'muhamadrobbifirmansyah@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '23/514616/SV/22393', 'Muhamad Robbi Firmansyah', 2023);

-- Putri Nurdiana
INSERT INTO users (id_roles, email, password) VALUES (3, 'putrinurdiana@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '23/514785/SV/22424', 'Putri Nurdiana', 2023);

-- SEPTYAN YAUMUL FATKHAN
INSERT INTO users (id_roles, email, password) VALUES (3, 'septyanyaumulfatkhan@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '23/516028/SV/22663', 'SEPTYAN YAUMUL FATKHAN', 2023);

-- AURELIUS BEVAN YUDIRA PALEVI
INSERT INTO users (id_roles, email, password) VALUES (3, 'aureliusbevanyudirapalevi@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '23/516090/SV/22681', 'AURELIUS BEVAN YUDIRA PALEVI', 2023);

-- Nur Aziz
INSERT INTO users (id_roles, email, password) VALUES (3, 'nuraziz@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '23/516582/SV/22690', 'Nur Aziz', 2023);

-- Aulia Rahma
INSERT INTO users (id_roles, email, password) VALUES (3, 'auliarahma2004@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '23/516584/SV/22691', 'Aulia Rahma', 2023);

-- Damarjati Adiyuda Muktitama
INSERT INTO users (id_roles, email, password) VALUES (3, 'damarjatiadiyudamuktitama516701@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '23/516701/SV/22702', 'Damarjati Adiyuda Muktitama', 2023);

-- Ghifari Nafhan Muhammad Zhafarizza
INSERT INTO users (id_roles, email, password) VALUES (3, 'ghifarinafhanmuhammadzhafarizza@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '23/516949/SV/22728', 'Ghifari Nafhan Muhammad Zhafarizza', 2023);

-- Deandra Santoso
INSERT INTO users (id_roles, email, password) VALUES (3, 'deandrasantoso@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '23/517045/SV/22736', 'Deandra Santoso', 2023);

-- Bhavanagattha Sampanno Wongso
INSERT INTO users (id_roles, email, password) VALUES (3, 'bhavanagatthasampannowongso@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '23/518257/SV/22934', 'Bhavanagattha Sampanno Wongso', 2023);

-- Mohamad Dwi Affriza
INSERT INTO users (id_roles, email, password) VALUES (3, 'mohamaddwiaffriza@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '23/518277/SV/22939', 'Mohamad Dwi Affriza', 2023);

-- Khairunnisa
INSERT INTO users (id_roles, email, password) VALUES (3, 'khairunnisa2004@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '23/518886/SV/23084', 'Khairunnisa', 2023);

-- TEGAR ADI NUGROHO
INSERT INTO users (id_roles, email, password) VALUES (3, 'tegaradinugroho2005@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '23/519703/SV/23165', 'TEGAR ADI NUGROHO', 2023);

-- Muhammad Farhan Perdana
INSERT INTO users (id_roles, email, password) VALUES (3, 'muhammadfarhanperdana@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '23/520292/SV/23223', 'Muhammad Farhan Perdana', 2023);

-- Sabilli Fathurozaq
INSERT INTO users (id_roles, email, password) VALUES (3, 'sabillifathurozaq@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '23/520432/SV/23239', 'Sabilli Fathurozaq', 2023);

-- Azki Nabila Albab
INSERT INTO users (id_roles, email, password) VALUES (3, 'azkinabilaalbab520585@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '23/520585/SV/23265', 'Azki Nabila Albab', 2023);

-- Nuhgroh ramadani
INSERT INTO users (id_roles, email, password) VALUES (3, 'nuhgrohramadani@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '23/521135/SV/23383', 'Nuhgroh ramadani', 2023);

-- MUHAMMAD NAUFAL RAHMANU ANINDITO
INSERT INTO users (id_roles, email, password) VALUES (3, 'muhammadnaufalrahmanuanindito@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '23/521226/SV/23403', 'MUHAMMAD NAUFAL RAHMANU ANINDITO', 2023);

-- MUHAMMAD RIFAI FIRDAUS
INSERT INTO users (id_roles, email, password) VALUES (3, 'muhammadrifaifirdaus@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '23/522149/SV/23614', 'MUHAMMAD RIFAI FIRDAUS', 2023);

-- MUHAMMAD NAUFAL DAFFACHRI
INSERT INTO users (id_roles, email, password) VALUES (3, 'muhammadnaufaldaffachri@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '23/522227/SV/23636', 'MUHAMMAD NAUFAL DAFFACHRI', 2023);

-- Syafira Naila Affani
INSERT INTO users (id_roles, email, password) VALUES (3, 'syafiranailaaffani@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '23/522372/SV/23675', 'Syafira Naila Affani', 2023);

-- M. MUSTAFA FAGAN
INSERT INTO users (id_roles, email, password) VALUES (3, 'mmustafafagan@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '23/523246/SV/23875', 'M. MUSTAFA FAGAN', 2023);

-- Muhammad Ernestiyo Guevara
INSERT INTO users (id_roles, email, password) VALUES (3, 'muhammadernestiyoguevara@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '23/512249/SV/22131', 'Muhammad Ernestiyo Guevara', 2023);

-- Muhammad Najwan Fadlillah
INSERT INTO users (id_roles, email, password) VALUES (3, 'muhammadnajwanfadlillah@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '23/513079/SV/22184', 'Muhammad Najwan Fadlillah', 2023);

-- Assifa Khairu Nisa
INSERT INTO users (id_roles, email, password) VALUES (3, 'assifakhairunisa2005@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '23/513234/SV/22202', 'Assifa Khairu Nisa', 2023);

-- Hamdan Maulana Muhammad
INSERT INTO users (id_roles, email, password) VALUES (3, 'hamdanmaulanamuhammad2004@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '23/514467/SV/22358', 'Hamdan Maulana Muhammad', 2023);

-- Syafiq Abdillah Habib
INSERT INTO users (id_roles, email, password) VALUES (3, 'syafiqabdillahhabib@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '23/514688/SV/22407', 'Syafiq Abdillah Habib', 2023);

-- Laily Nuriyatul Fauziah
INSERT INTO users (id_roles, email, password) VALUES (3, 'lailynuriyatulfauziah@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '23/514731/SV/22415', 'Laily Nuriyatul Fauziah', 2023);

-- Christian Peter Pakpahan
INSERT INTO users (id_roles, email, password) VALUES (3, 'christianpeterpakpahan@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '23/515001/SV/22451', 'Christian Peter Pakpahan', 2023);

-- Irene Talitha Tyas Raharjo
INSERT INTO users (id_roles, email, password) VALUES (3, 'irenetalithatyasraharjo@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '23/515223/SV/22503', 'Irene Talitha Tyas Raharjo', 2023);

-- RILA NAJJAKHA
INSERT INTO users (id_roles, email, password) VALUES (3, 'rilanajjakha@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '23/515885/SV/22633', 'RILA NAJJAKHA', 2023);

-- Heinrich Radhitya Gavrilla Atmaja
INSERT INTO users (id_roles, email, password) VALUES (3, 'heinrichradhityagavr@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '23/516772/SV/22713', 'Heinrich Radhitya Gavrilla Atmaja', 2023);

-- Dias Lintang Prabowo
INSERT INTO users (id_roles, email, password) VALUES (3, 'diaslintangprabowo@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '23/517288/SV/22753', 'Dias Lintang Prabowo', 2023);

-- Wahyu Agung Barokah
INSERT INTO users (id_roles, email, password) VALUES (3, 'wahyuagungbarokah@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '23/517579/SV/22798', 'Wahyu Agung Barokah', 2023);

-- Yeka Nurfy Mumtahany
INSERT INTO users (id_roles, email, password) VALUES (3, 'yekanurfymumtahany@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '23/517662/SV/22813', 'Yeka Nurfy Mumtahany', 2023);

-- Ahmad Firdausi Nuzula Khan
INSERT INTO users (id_roles, email, password) VALUES (3, 'ahmadfirdausinuzulakhan@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '23/518677/SV/23032', 'Ahmad Firdausi Nuzula Khan', 2023);

-- Yogi Pradana Isdiyanto
INSERT INTO users (id_roles, email, password) VALUES (3, 'yogipradanaisdiyanto@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '23/519039/SV/23113', 'Yogi Pradana Isdiyanto', 2023);

-- DEVANGGA ARYA HARTA WIJAYANTO
INSERT INTO users (id_roles, email, password) VALUES (3, 'devanggaaryahartawijayanto@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '23/520051/SV/23203', 'DEVANGGA ARYA HARTA WIJAYANTO', 2023);

-- Zaki Wahyu Perdana
INSERT INTO users (id_roles, email, password) VALUES (3, 'zakiwahyuperdana@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '23/520245/SV/23219', 'Zaki Wahyu Perdana', 2023);

-- ZAIDAN NUR RAMADHAN
INSERT INTO users (id_roles, email, password) VALUES (3, 'zaidannurramadhan@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '23/520344/SV/23231', 'ZAIDAN NUR RAMADHAN', 2023);

-- MARSHA BILQIIS NASYWAA
INSERT INTO users (id_roles, email, password) VALUES (3, 'marshabilqiisnasywaa2005@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '23/520452/SV/23242', 'MARSHA BILQIIS NASYWAA', 2023);

-- Muhammad Al Fayyadh
INSERT INTO users (id_roles, email, password) VALUES (3, 'muhammadalfayyadh@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '23/520499/SV/23248', 'Muhammad Al Fayyadh', 2023);

-- JOE SOZANOLO WARUWU
INSERT INTO users (id_roles, email, password) VALUES (3, 'joesozanolowaruwu@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '23/520609/SV/23269', 'JOE SOZANOLO WARUWU', 2023);

-- Rayendra Ogya Nagata
INSERT INTO users (id_roles, email, password) VALUES (3, 'rayendraogyanagata@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '23/522002/SV/23563', 'Rayendra Ogya Nagata', 2023);

-- Rahmat Nur Panghegar
INSERT INTO users (id_roles, email, password) VALUES (3, 'rahmatnurpanghegar@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '23/522040/SV/23574', 'Rahmat Nur Panghegar', 2023);

-- NAUFAL SALMAN MULYADI
INSERT INTO users (id_roles, email, password) VALUES (3, 'naufalsalmanmulyadi@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '23/522397/SV/23683', 'NAUFAL SALMAN MULYADI', 2023);

-- NAUFAL ADHITYA PRATAMA
INSERT INTO users (id_roles, email, password) VALUES (3, 'naufaladhityapratama@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '23/522485/SV/23703', 'NAUFAL ADHITYA PRATAMA', 2023);

-- Zhazha Nurani
INSERT INTO users (id_roles, email, password) VALUES (3, 'zhazhanurani@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '23/522532/SV/23716', 'Zhazha Nurani', 2023);

-- Daffa Zulfahmi Al-Ahyar
INSERT INTO users (id_roles, email, password) VALUES (3, 'daffazulfahmial-ahyar@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '23/511963/SV/22119', 'Daffa Zulfahmi Al-Ahyar', 2023);

-- Amelia Ayuni Tri Cahyanti
INSERT INTO users (id_roles, email, password) VALUES (3, 'ameliaayunitricahyanti2005@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '23/512507/SV/22146', 'Amelia Ayuni Tri Cahyanti', 2023);

-- Assyfa Nur Fathona
INSERT INTO users (id_roles, email, password) VALUES (3, 'assyfanurfathona@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '23/513289/SV/22210', 'Assyfa Nur Fathona', 2023);

-- Rifqi Renaldo
INSERT INTO users (id_roles, email, password) VALUES (3, 'rifqirenaldo@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '23/513536/SV/22231', 'Rifqi Renaldo', 2023);

-- Ibanez Centivolia Ahista
INSERT INTO users (id_roles, email, password) VALUES (3, 'ibanezcentivoliaahista@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '23/513962/SV/22272', 'Ibanez Centivolia Ahista', 2023);

-- Muhammad Irfan Valerian
INSERT INTO users (id_roles, email, password) VALUES (3, 'muhammadirfanvalerian@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '23/514691/SV/22408', 'Muhammad Irfan Valerian', 2023);

-- Ruhil Muhammad Ukasyah
INSERT INTO users (id_roles, email, password) VALUES (3, 'ruhilmuhammadukasyah2005@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '23/514867/SV/22440', 'Ruhil Muhammad Ukasyah', 2023);

-- Fairuz Zahirah Abhista
INSERT INTO users (id_roles, email, password) VALUES (3, 'fairuzzahirahabhista@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '23/515247/SV/22507', 'Fairuz Zahirah Abhista', 2023);

-- Nadzira Azhani Farahiya
INSERT INTO users (id_roles, email, password) VALUES (3, 'nadziraazhanifarahiya@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '23/515567/SV/22577', 'Nadzira Azhani Farahiya', 2023);

-- Marcelino
INSERT INTO users (id_roles, email, password) VALUES (3, 'marcelino@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '23/516942/SV/22727', 'Marcelino', 2023);

-- Muhammad Faiz Ramdhan
INSERT INTO users (id_roles, email, password) VALUES (3, 'muhammadfaizramdhan@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '23/517328/SV/22757', 'Muhammad Faiz Ramdhan', 2023);

-- Poernomo Maulana Rofif Aqilla
INSERT INTO users (id_roles, email, password) VALUES (3, 'poernomomaulanarofifaqilla2004@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '23/518260/SV/22936', 'Poernomo Maulana Rofif Aqilla', 2023);

-- Anugrah Aidil Fitri
INSERT INTO users (id_roles, email, password) VALUES (3, 'anugrahaidilfitri@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '23/518687/SV/23034', 'Anugrah Aidil Fitri', 2023);

-- Muhamad Raihan Ratna Badar Aji
INSERT INTO users (id_roles, email, password) VALUES (3, 'muhamadraihanratnabadaraji2004@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '23/519254/SV/23148', 'Muhamad Raihan Ratna Badar Aji', 2023);

-- Wildan Hanif Abdillah
INSERT INTO users (id_roles, email, password) VALUES (3, 'wildanhanifabdillah@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '23/520123/SV/23207', 'Wildan Hanif Abdillah', 2023);

-- KARINA ANDRIANI
INSERT INTO users (id_roles, email, password) VALUES (3, 'karinaandriani@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '23/520201/SV/23215', 'KARINA ANDRIANI', 2023);

-- Govan Dwi Aditya
INSERT INTO users (id_roles, email, password) VALUES (3, 'govandwiaditya@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '23/520314/SV/23228', 'Govan Dwi Aditya', 2023);

-- IDHAM FAUZAN
INSERT INTO users (id_roles, email, password) VALUES (3, 'idhamfauzan2004@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '23/520324/SV/23229', 'IDHAM FAUZAN', 2023);

-- Alin Septiani Nur Aisyah
INSERT INTO users (id_roles, email, password) VALUES (3, 'alinseptianinuraisyah@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '23/520895/SV/23320', 'Alin Septiani Nur Aisyah', 2023);

-- MULIA CHRISTIAN GOMGOM P SIMANJUNTAK
INSERT INTO users (id_roles, email, password) VALUES (3, 'muliachristiangomgompsimanjuntak@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '23/521107/SV/23374', 'MULIA CHRISTIAN GOMGOM P SIMANJUNTAK', 2023);

-- Allan Raditya Hutomo
INSERT INTO users (id_roles, email, password) VALUES (3, 'allanradityahutomo@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '23/521796/SV/23501', 'Allan Raditya Hutomo', 2023);

-- Emilio Muhammad Hamsyah Junior
INSERT INTO users (id_roles, email, password) VALUES (3, 'emiliomuhammadhamsyahjunior@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '23/522018/SV/23568', 'Emilio Muhammad Hamsyah Junior', 2023);

-- Andika Dwi Prasetya
INSERT INTO users (id_roles, email, password) VALUES (3, 'andikadwiprasetya@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '23/522305/SV/23658', 'Andika Dwi Prasetya', 2023);

-- DWI YOANDA FEBRIARSA
INSERT INTO users (id_roles, email, password) VALUES (3, 'dwiyoandafebriarsa@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '23/522696/SV/23755', 'DWI YOANDA FEBRIARSA', 2023);


-- // Angkatan 24
-- LILIS PUSPITA HARIA
INSERT INTO users (id_roles, email, password) VALUES (3, 'lilispuspitaharia@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '24/533425/SV/23907', 'LILIS PUSPITA HARIA', 2024);

-- MARDHIKA MURNI PRAMESTIKA
INSERT INTO users (id_roles, email, password) VALUES (3, 'mardhikamurnipramestika2005@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '24/533524/SV/23914', 'MARDHIKA MURNI PRAMESTIKA', 2024);

-- MOHAMMAD AVIRZA RADYATANZA
INSERT INTO users (id_roles, email, password) VALUES (3, 'mohammadavirzaradyatanza@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '24/534267/SV/24022', 'MOHAMMAD AVIRZA RADYATANZA', 2024);

-- SHINOSUKE ALEXANDER SWANDJAYA
INSERT INTO users (id_roles, email, password) VALUES (3, 'shinosukealexanderswandjaya2006@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '24/534826/SV/24095', 'SHINOSUKE ALEXANDER SWANDJAYA', 2024);

-- ALVISTA MAULA ZAHRA
INSERT INTO users (id_roles, email, password) VALUES (3, 'alvistamaulazahra@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '24/534872/SV/24103', 'ALVISTA MAULA ZAHRA', 2024);

-- PRIHASTOMO BUDI SATRIO
INSERT INTO users (id_roles, email, password) VALUES (3, 'prihastomobudisatrio2005@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '24/534908/SV/24108', 'PRIHASTOMO BUDI SATRIO', 2024);

-- RAKAI AHMAD MAULANA
INSERT INTO users (id_roles, email, password) VALUES (3, 'rakaiahmadmaulana@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '24/535115/SV/24156', 'RAKAI AHMAD MAULANA', 2024);

-- OKTA ALSHINA ARVA PARAHYTA
INSERT INTO users (id_roles, email, password) VALUES (3, 'oktaalshinaarvaparahyta@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '24/535154/SV/24161', 'OKTA ALSHINA ARVA PARAHYTA', 2024);

-- RAINARD ZULFAN PRATAMA
INSERT INTO users (id_roles, email, password) VALUES (3, 'rainardzulfanpratama@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '24/535186/SV/24168', 'RAINARD ZULFAN PRATAMA', 2024);

-- RIZENDY AFFARIN
INSERT INTO users (id_roles, email, password) VALUES (3, 'rizendyaffarin@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '24/535196/SV/24171', 'RIZENDY AFFARIN', 2024);

-- ADELARDO TSABAT CHALADA ABIDIN
INSERT INTO users (id_roles, email, password) VALUES (3, 'adelardotsabatchalad@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '24/535296/SV/24191', 'ADELARDO TSABAT CHALADA ABIDIN', 2024);

-- MUTIA UMNIATI ZUPRI
INSERT INTO users (id_roles, email, password) VALUES (3, 'mutiaumniatizupri@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '24/535316/SV/24196', 'MUTIA UMNIATI ZUPRI', 2024);

-- DENISE ADITYA
INSERT INTO users (id_roles, email, password) VALUES (3, 'deniseaditya@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '24/535439/SV/24228', 'DENISE ADITYA', 2024);

-- NADHIRA FARRA AISYA SUISTIYONO
INSERT INTO users (id_roles, email, password) VALUES (3, 'nadhirafarraaisyasui@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '24/535556/SV/24264', 'NADHIRA FARRA AISYA SUISTIYONO', 2024);

-- AKMAL MANGGALA PUTRA
INSERT INTO users (id_roles, email, password) VALUES (3, 'akmalmanggalaputra2005@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '24/536182/SV/24402', 'AKMAL MANGGALA PUTRA', 2024);

-- PRALAMBANG BHAYANGKARA YHUDANTO
INSERT INTO users (id_roles, email, password) VALUES (3, 'pralambangbhayangkarayhudanto@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '24/536223/SV/24414', 'PRALAMBANG BHAYANGKARA YHUDANTO', 2024);

-- ABDULLAH AFIF HABIBURROHMAN
INSERT INTO users (id_roles, email, password) VALUES (3, 'abdullahafifhabiburrohman@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '24/537611/SV/24441', 'ABDULLAH AFIF HABIBURROHMAN', 2024);

-- VIDKY ADHI PRADANA
INSERT INTO users (id_roles, email, password) VALUES (3, 'vidkyadhipradana2004@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '24/537759/SV/24448', 'VIDKY ADHI PRADANA', 2024);

-- MUHAMMAD FAUZAN PUTRA TRISULADANA
INSERT INTO users (id_roles, email, password) VALUES (3, 'muhammadfauzanputratrisuladana@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '24/538699/SV/24524', 'MUHAMMAD FAUZAN PUTRA TRISULADANA', 2024);

-- TB. MUHAMMAD ENDRA ZHAFIR AL GHIFARI
INSERT INTO users (id_roles, email, password) VALUES (3, 'tbmuhammadendrazhafiralghifari@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '24/538769/SV/24535', 'TB. MUHAMMAD ENDRA ZHAFIR AL GHIFARI', 2024);

-- GADING ATMAJA
INSERT INTO users (id_roles, email, password) VALUES (3, 'gadingatmaja2006@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '24/538944/SV/24554', 'GADING ATMAJA', 2024);

-- HANAN FIJANANTO
INSERT INTO users (id_roles, email, password) VALUES (3, 'hananfijananto@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '24/538946/SV/24555', 'HANAN FIJANANTO', 2024);

-- DAFFA'' ABIYYU DZULFIQAR
INSERT INTO users (id_roles, email, password) VALUES (3, 'daffaabiyyudzulfiqar@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '24/539118/SV/24566', 'DAFFA'' ABIYYU DZULFIQAR', 2024);

-- MUHAMMAD RAKAN HIBRIZI
INSERT INTO users (id_roles, email, password) VALUES (3, 'muhammadrakanhibrizi2005@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '24/539132/SV/24568', 'MUHAMMAD RAKAN HIBRIZI', 2024);

-- HAYYINA ATTAQIYYA
INSERT INTO users (id_roles, email, password) VALUES (3, 'hayyinaattaqiyya@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '24/540113/SV/24777', 'HAYYINA ATTAQIYYA', 2024);

-- DAVEENA ALEXANDRA PENTURY
INSERT INTO users (id_roles, email, password) VALUES (3, 'daveenaalexandrapentury@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '24/540390/SV/24833', 'DAVEENA ALEXANDRA PENTURY', 2024);

-- DANNY SETIAWAN
INSERT INTO users (id_roles, email, password) VALUES (3, 'dannysetiawan2003@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '24/541304/SV/24894', 'DANNY SETIAWAN', 2024);

-- Dimas Satria Widjatmiko
INSERT INTO users (id_roles, email, password) VALUES (3, 'dimassatriawidjatmiko@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '24/541372/SV/24899', 'Dimas Satria Widjatmiko', 2024);

-- SYAKIRA ZAHRATUL FIRDAUS
INSERT INTO users (id_roles, email, password) VALUES (3, 'syakirazahratulfirdaus@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '24/541424/SV/24904', 'SYAKIRA ZAHRATUL FIRDAUS', 2024);

-- DELLA NURIZKI
INSERT INTO users (id_roles, email, password) VALUES (3, 'dellanurizki@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '24/541430/SV/24905', 'DELLA NURIZKI', 2024);

-- FALAH AULADI
INSERT INTO users (id_roles, email, password) VALUES (3, 'falahauladi2006@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '24/541475/SV/24912', 'FALAH AULADI', 2024);

-- Ariq Fausta Djohar
INSERT INTO users (id_roles, email, password) VALUES (3, 'ariqfaustadjohar@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '24/541553/SV/24922', 'Ariq Fausta Djohar', 2024);

-- HISYAM AL RAYYAN
INSERT INTO users (id_roles, email, password) VALUES (3, 'hisyamalrayyan@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '24/541582/SV/24926', 'HISYAM AL RAYYAN', 2024);

-- Saskia Ainun Nafisa
INSERT INTO users (id_roles, email, password) VALUES (3, 'saskiaainunnafisa@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '24/541595/SV/24929', 'Saskia Ainun Nafisa', 2024);

-- Dimas Jati Satria
INSERT INTO users (id_roles, email, password) VALUES (3, 'dimasjatisatria@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '24/541641/SV/24935', 'Dimas Jati Satria', 2024);

-- Muhammad Hisyam Ardiansyah
INSERT INTO users (id_roles, email, password) VALUES (3, 'muhammadhisyamardiansyah@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '24/541793/SV/24951', 'Muhammad Hisyam Ardiansyah', 2024);

-- Safira Dwita Ramadhani
INSERT INTO users (id_roles, email, password) VALUES (3, 'safiradwitaramadhani@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '24/541969/SV/24981', 'Safira Dwita Ramadhani', 2024);

-- Muhammad Dhiya’ulhaq Fadhlurrahman
INSERT INTO users (id_roles, email, password) VALUES (3, 'muhammaddhiyaulhaqfadhlurrahman@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '24/541998/SV/24984', 'Muhammad Dhiya’ulhaq Fadhlurrahman', 2024);

-- Dzakiya Hakima Adila
INSERT INTO users (id_roles, email, password) VALUES (3, 'dzakiyahakimaadila@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '24/542103/SV/25003', 'Dzakiya Hakima Adila', 2024);

-- FATIMAH AZZAHRA
INSERT INTO users (id_roles, email, password) VALUES (3, 'fatimahazzahra2004@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '24/542303/SV/25029', 'FATIMAH AZZAHRA', 2024);

-- Erico Ali Gutama
INSERT INTO users (id_roles, email, password) VALUES (3, 'ericoaligutama2006@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '24/542626/SV/25066', 'Erico Ali Gutama', 2024);

-- ALFIZ DESTA ARIANT PERMANA
INSERT INTO users (id_roles, email, password) VALUES (3, 'alfizdestaariantpermana@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '24/543220/SV/25173', 'ALFIZ DESTA ARIANT PERMANA', 2024);

-- Ahsani Fadhli Ilahi
INSERT INTO users (id_roles, email, password) VALUES (3, 'ahsanifadhliilahi@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '24/543329/SV/25192', 'Ahsani Fadhli Ilahi', 2024);

-- Raihan Esfandyka Suwandi
INSERT INTO users (id_roles, email, password) VALUES (3, 'raihanesfandykasuwandi@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '24/543374/SV/25201', 'Raihan Esfandyka Suwandi', 2024);

-- Alief Muhammad Latif
INSERT INTO users (id_roles, email, password) VALUES (3, 'aliefmuhammadlatif@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '24/543673/SV/25244', 'Alief Muhammad Latif', 2024);

-- Delviano Khayru Attahira
INSERT INTO users (id_roles, email, password) VALUES (3, 'delvianokhayruattahira@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '24/543732/SV/25259', 'Delviano Khayru Attahira', 2024);

-- SEDAYU HARGONO SETO
INSERT INTO users (id_roles, email, password) VALUES (3, 'sedayuhargonoseto@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '24/543905/SV/25288', 'SEDAYU HARGONO SETO', 2024);

-- AURELL ACHMAD MADINA HARTAMA
INSERT INTO users (id_roles, email, password) VALUES (3, 'aurellachmadmadinahartama@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '24/543963/SV/25299', 'AURELL ACHMAD MADINA HARTAMA', 2024);

-- TITO ALLA KHAIRI
INSERT INTO users (id_roles, email, password) VALUES (3, 'titoallakhairi@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '24/544463/SV/25424', 'TITO ALLA KHAIRI', 2024);

-- Rizki Nur Ikhsan
INSERT INTO users (id_roles, email, password) VALUES (3, 'rizkinurikhsan@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '24/544540/SV/25445', 'Rizki Nur Ikhsan', 2024);

-- LARASATI AYU GANTARI
INSERT INTO users (id_roles, email, password) VALUES (3, 'larasatiayugantari@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '24/545756/SV/25752', 'LARASATI AYU GANTARI', 2024);

-- SITI NUR AZIZAH
INSERT INTO users (id_roles, email, password) VALUES (3, 'sitinurazizah2006@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '24/533921/SV/23957', 'SITI NUR AZIZAH', 2024);

-- AYU MIRNAWATI
INSERT INTO users (id_roles, email, password) VALUES (3, 'ayumirnawati@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '24/534245/SV/24017', 'AYU MIRNAWATI', 2024);

-- HAFIDZ RIZQULLAH PRASETYA
INSERT INTO users (id_roles, email, password) VALUES (3, 'hafidzrizqullahprasetya@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '24/535493/SV/24243', 'HAFIDZ RIZQULLAH PRASETYA', 2024);

-- SENDI SENIORA
INSERT INTO users (id_roles, email, password) VALUES (3, 'sendiseniora@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '24/535549/SV/24260', 'SENDI SENIORA', 2024);

-- KAMILA ANISA
INSERT INTO users (id_roles, email, password) VALUES (3, 'kamilaanisa@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '24/535633/SV/24276', 'KAMILA ANISA', 2024);

-- AHMAD FAHIM
INSERT INTO users (id_roles, email, password) VALUES (3, 'ahmadfahim@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '24/535644/SV/24279', 'AHMAD FAHIM', 2024);

-- RIZKY MAULIDIA SALSABILA
INSERT INTO users (id_roles, email, password) VALUES (3, 'rizkymaulidiasalsabila@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '24/535671/SV/24286', 'RIZKY MAULIDIA SALSABILA', 2024);

-- JANUARSYAH AKBAR
INSERT INTO users (id_roles, email, password) VALUES (3, 'januarsyahakbar@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '24/535846/SV/24314', 'JANUARSYAH AKBAR', 2024);

-- BRILIAN FATIH WICAKSONO
INSERT INTO users (id_roles, email, password) VALUES (3, 'brilianfatihwicaksono2005@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '24/535871/SV/24320', 'BRILIAN FATIH WICAKSONO', 2024);

-- TEGAR RADITYA HIKMAWAN
INSERT INTO users (id_roles, email, password) VALUES (3, 'tegarradityahikmawan@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '24/535872/SV/24321', 'TEGAR RADITYA HIKMAWAN', 2024);

-- M. DZAKI DIANDRA PUTRA
INSERT INTO users (id_roles, email, password) VALUES (3, 'mdzakidiandraputra@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '24/535924/SV/24340', 'M. DZAKI DIANDRA PUTRA', 2024);

-- MATTHEW HAYUNAJI PRIANTARA
INSERT INTO users (id_roles, email, password) VALUES (3, 'matthewhayunajipriantara@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '24/536179/SV/24400', 'MATTHEW HAYUNAJI PRIANTARA', 2024);

-- NAFILLAH IZZAH SYAHFITRI WARDANI
INSERT INTO users (id_roles, email, password) VALUES (3, 'nafillahizzahsyahfitriwardani@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '24/536247/SV/24422', 'NAFILLAH IZZAH SYAHFITRI WARDANI', 2024);

-- ADITYA LUCKY ZULKARNAEN
INSERT INTO users (id_roles, email, password) VALUES (3, 'adityaluckyzulkarnaen@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '24/537764/SV/24449', 'ADITYA LUCKY ZULKARNAEN', 2024);

-- FAHMI HAQQUL IHSAN
INSERT INTO users (id_roles, email, password) VALUES (3, 'fahmihaqqulihsan@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '24/538369/SV/24491', 'FAHMI HAQQUL IHSAN', 2024);

-- AZZAHRA ARMELIA AINA
INSERT INTO users (id_roles, email, password) VALUES (3, 'azzahraarmeliaaina2004@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '24/538562/SV/24509', 'AZZAHRA ARMELIA AINA', 2024);

-- STANLEY ANGELINO
INSERT INTO users (id_roles, email, password) VALUES (3, 'stanleyangelino@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '24/539263/SV/24584', 'STANLEY ANGELINO', 2024);

-- SOUNDA HAFUZA NAJWAN
INSERT INTO users (id_roles, email, password) VALUES (3, 'soundahafuzanajwan@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '24/539773/SV/24671', 'SOUNDA HAFUZA NAJWAN', 2024);

-- AHMAD RIZWAN HAMKA
INSERT INTO users (id_roles, email, password) VALUES (3, 'ahmadrizwanhamka@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '24/539823/SV/24684', 'AHMAD RIZWAN HAMKA', 2024);

-- FARADIS YULIANTO
INSERT INTO users (id_roles, email, password) VALUES (3, 'faradisyulianto2006@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '24/539894/SV/24706', 'FARADIS YULIANTO', 2024);

-- MUHAMMAD ARROFII'' FAIZ
INSERT INTO users (id_roles, email, password) VALUES (3, 'muhammadarrofiifaiz@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '24/539896/SV/24708', 'MUHAMMAD ARROFII'' FAIZ', 2024);

-- MUHAMMAD ADIB NAZIRI
INSERT INTO users (id_roles, email, password) VALUES (3, 'muhammadadibnaziri@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '24/540019/SV/24747', 'MUHAMMAD ADIB NAZIRI', 2024);

-- AZRIL FAHMIARDI
INSERT INTO users (id_roles, email, password) VALUES (3, 'azrilfahmiardi@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '24/540076/SV/24768', 'AZRIL FAHMIARDI', 2024);

-- YAFI NUQMAN ELIANTO
INSERT INTO users (id_roles, email, password) VALUES (3, 'yafinuqmanelianto@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '24/540133/SV/24782', 'YAFI NUQMAN ELIANTO', 2024);

-- ANINDYA NAILAH SURYAWAN
INSERT INTO users (id_roles, email, password) VALUES (3, 'anindyanailahsuryawan@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '24/540428/SV/24840', 'ANINDYA NAILAH SURYAWAN', 2024);

-- NAWWAF ZAYYAN MUSYAFA
INSERT INTO users (id_roles, email, password) VALUES (3, 'nawwafzayyanmusyafa@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '24/540567/SV/24877', 'NAWWAF ZAYYAN MUSYAFA', 2024);

-- Javian Oktaviansyah
INSERT INTO users (id_roles, email, password) VALUES (3, 'javianoktaviansyah@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '24/541440/SV/24906', 'Javian Oktaviansyah', 2024);

-- FARREL DAMA ALFARABI
INSERT INTO users (id_roles, email, password) VALUES (3, 'farreldamaalfarabi2006@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '24/541456/SV/24910', 'FARREL DAMA ALFARABI', 2024);

-- Hilarius Christiano Avin Paliling
INSERT INTO users (id_roles, email, password) VALUES (3, 'hilariuschristianoavinpaliling2004@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '24/542159/SV/25009', 'Hilarius Christiano Avin Paliling', 2024);

-- Devin Sotya Prathama
INSERT INTO users (id_roles, email, password) VALUES (3, 'devinsotyaprathama2005@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '24/542213/SV/25017', 'Devin Sotya Prathama', 2024);

-- safwan ramadhan arfian
INSERT INTO users (id_roles, email, password) VALUES (3, 'safwanramadhanarfian2005@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '24/542240/SV/25020', 'safwan ramadhan arfian', 2024);

-- Jibrilian Wulsa Ariswanto
INSERT INTO users (id_roles, email, password) VALUES (3, 'jibrilianwulsaariswanto@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '24/542393/SV/25040', 'Jibrilian Wulsa Ariswanto', 2024);

-- RAIHANANTA KHOIRIL ANAM PITOYO
INSERT INTO users (id_roles, email, password) VALUES (3, 'raihanantakhoirilanampitoyo@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '24/542538/SV/25053', 'RAIHANANTA KHOIRIL ANAM PITOYO', 2024);

-- Revaldo Kuncoro Putra
INSERT INTO users (id_roles, email, password) VALUES (3, 'revaldokuncoroputra2006@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '24/542620/SV/25063', 'Revaldo Kuncoro Putra', 2024);

-- Devia Artika Maharani
INSERT INTO users (id_roles, email, password) VALUES (3, 'deviaartikamaharani@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '24/542925/SV/25120', 'Devia Artika Maharani', 2024);

-- RIZKY LAKSMITHA
INSERT INTO users (id_roles, email, password) VALUES (3, 'rizkylaksmitha@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '24/543122/SV/25155', 'RIZKY LAKSMITHA', 2024);

-- Gurveender Jeet Kaur
INSERT INTO users (id_roles, email, password) VALUES (3, 'gurveenderjeetkaur2006@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '24/544341/SV/25392', 'Gurveender Jeet Kaur', 2024);

-- Khaylila Zahra Ardhya Sebayang
INSERT INTO users (id_roles, email, password) VALUES (3, 'khaylilazahraardhyasebayang@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '24/544362/SV/25396', 'Khaylila Zahra Ardhya Sebayang', 2024);

-- Rua Adelia
INSERT INTO users (id_roles, email, password) VALUES (3, 'ruaadelia@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '24/544411/SV/25413', 'Rua Adelia', 2024);

-- MUHAMMAD ABEL ABHINAYA RIANANTO
INSERT INTO users (id_roles, email, password) VALUES (3, 'muhammadabelabhinaya@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '24/544597/SV/25468', 'MUHAMMAD ABEL ABHINAYA RIANANTO', 2024);

-- Arga Athallah Herlambang
INSERT INTO users (id_roles, email, password) VALUES (3, 'argaathallahherlambang@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '24/544911/SV/25566', 'Arga Athallah Herlambang', 2024);

-- GUNAEL ALEXANDER SILALAHI
INSERT INTO users (id_roles, email, password) VALUES (3, 'gunaelalexandersilalahi@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '24/544963/SV/25579', 'GUNAEL ALEXANDER SILALAHI', 2024);

-- Ayu Atikah
INSERT INTO users (id_roles, email, password) VALUES (3, 'ayuatikah@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '24/545004/SV/25588', 'Ayu Atikah', 2024);

-- Aliya Khansa Kamaliya
INSERT INTO users (id_roles, email, password) VALUES (3, 'aliyakhansakamaliya2006@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '24/545049/SV/25592', 'Aliya Khansa Kamaliya', 2024);

-- Ghani Zulhusni Bahri
INSERT INTO users (id_roles, email, password) VALUES (3, 'ghanizulhusnibahri@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '24/545172/SV/25618', 'Ghani Zulhusni Bahri', 2024);

-- Hasan Izzuddin Alfatih
INSERT INTO users (id_roles, email, password) VALUES (3, 'hasanizzuddinalfatih@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '24/545178/SV/25620', 'Hasan Izzuddin Alfatih', 2024);

-- David Antonio Syahputra
INSERT INTO users (id_roles, email, password) VALUES (3, 'davidantoniosyahputra2005@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '24/545212/SV/25630', 'David Antonio Syahputra', 2024);

-- Farid Ahmad Nur Rahman
INSERT INTO users (id_roles, email, password) VALUES (3, 'faridaahmadnurrahman@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '24/545344/SV/25660', 'Farid Ahmad Nur Rahman', 2024);

-- Muhammad Zidan Alhilali
INSERT INTO users (id_roles, email, password) VALUES (3, 'muhammadzidanalhilali@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '24/545364/SV/25663', 'Muhammad Zidan Alhilali', 2024);

-- Muhammad Arief Andriansyah
INSERT INTO users (id_roles, email, password) VALUES (3, 'muhammadariefandriansyah2005@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '24/545740/SV/25748', 'Muhammad Arief Andriansyah', 2024);

-- Fahmi Amaniel Fadli
INSERT INTO users (id_roles, email, password) VALUES (3, 'fahmiamanielfadli2005@mail.ugm.ac.id', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '24/545808/SV/25765', 'Fahmi Amaniel Fadli', 2024);

-- Admin 
INSERT INTO users (id_roles, email, password) VALUES (1, 'mustafafagan@gmail.com', '12345');
SET @last_id = LAST_INSERT_ID();
INSERT INTO user_details (id_users, nim, name, entry_year) VALUES (@last_id, '69/23232/SV/696969', 'Admin', 2019);

-- Commit the transaction
COMMIT;

-- Note: This SQL script includes all students from the CSV file.
-- The entry_year is extracted from the first part of the NIM (e.g., '19/...' becomes 2019).
-- Role ID is set to 2 for batch 19 (alumni) and 3 for all other batches (mahasiswa).
