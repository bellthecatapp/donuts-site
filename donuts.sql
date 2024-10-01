
CREATE database donuts default character set utf8 collate utf8_general_ci;

CREATE user 'donuts'@'localhost' identified by 'password';

grant all on donuts.* to 'donuts'@'localhost';

use donuts;

create table customer (
id int auto_increment primary key, 
name varchar(100) not null, 
kana varchar(100) not null, 
post_code varchar(100) not null, 
address varchar(200) not null, 
mail varchar(100) not null unique, 
password varchar(255) not null
);

create table product (
id int auto_increment primary key, 
name varchar(200) not null, 
price int not null, 
description varchar(1000) not null 
);

create table card (
id int not null primary key, 
card_name varchar(100) not null, 
card_type varchar(100) not null, 
card_no varchar(22) not null unique, 
card_month int not null, 
card_year int not null, 
card_security_code int not null,
foreign key(id) references customer(id)
);

create table purchase (
id int not null primary key, 
customer_id int not null, 
foreign key(customer_id) references customer(id) 
);

create table purchase_detail(
purchase_id int not null, 
product_id int not null, 
count int not null,
primary key(purchase_id, product_id),
foreign key(purchase_id) references purchase(id),
foreign key(product_id) references product(id) 
);

insert into product VALUES(null,'CCドーナツ 当店オリジナル（5個入り）','1500','当店のオリジナル商品、CCドーナツは、サクサクの食感が特徴のプレーンタイプのドーナツです。素材にこだわり、丁寧に揚げた生地は軽やかでサクッとした食感が楽しめます。一口食べれば、口の中に広がる甘くて香ばしい香りと、口どけの良い食感が感じられます。');
insert into product VALUES(null,'チョコレートデライト（5個入り）','1600','そこそこ甘いチョコをかけて、いい感じにしたドーナツです。アクセントに白い線を書いてみました。');
insert into product VALUES(null,'キャラメルクリーム（5個入り）','1600','香ばしいドーナツです。キャラメルソースをかけましたが、物足りなかったので生地にもキャラメルを入れてみました。頬も歯もとろける1品になります。');
insert into product VALUES(null,'ストロベリークラッシュ（5個入り）','1800','厳選された酸っぱめのイチゴをドロドロにしたあとに、大量の香料と着色料と砂糖を混ぜ込んだスプレーを散りばめておきました。カラフルですね。');
insert into product VALUES(null,'フルーツドーナツセット（12個入り）','3500','新鮮で豊かなフルーツをたっぷりと使用した贅沢な12個入りセットです。このセットには、季節の最高のフルーツを厳選し、ドーナツに取り入れました。口に入れた瞬間にフルーツの風味と生地のハーモニーが広がります。色鮮やかな見た目も魅力の一つです。');
insert into product VALUES(null,'フルーツドーナツセット（14個入り）','4000','さすがにここまで食べるお客様は中々いないでしょう。当店のスタッフは14個入りを主食としていますが。');
insert into product VALUES(null,'ベストセレクションボックス（4個入り）','1200','4個なんて、すぐ食べちゃいますよ。黙って12個セット買ったほうがいいです。');
insert into product VALUES(null,'チョコクラッシュボックス（7個入り）','2400','空腹状態でチョコクラッシュボックスを注文しようとしていませんか。一旦ご飯を済ましてから検討してください。チョコ専門の偏食家でない限り飽きるボックスです。');
insert into product VALUES(null,'クリームボックス（4個入り）','1400','クリームドーナツの詰め合わせです。実は4個のうち1個のドーナツだけロゼソースを注入しておきました。クリームばかりだと飽きそうと思った社長の思いやりです。決してSNSでバズりたいとかそういう思いはありません。お客様への愛です。');
insert into product VALUES(null,'クリームボックス（9個入り）','2800','クリームドーナツの詰め合わせです。実は9個のうち、２個のドーナツにロゼソース、さらに2個にヤンニョムチキンソースを注入しておきました。クリームばかりだと飽きるかと思った社長の思いやりです。');

insert into customer VALUES(null,'ドーナツ太郎','ドーナツタロウ','123456','千葉県〇〇市中央1-1-1','123@gmail.com','donuts');

-- 上記の記述では不足があったので、下記のsql文を読み込ませて下さい。



create table product (
id int auto_increment primary key, 
name varchar(200) not null, 
price int not null, 
description varchar(1000) not null 
);


insert into product VALUES(null,'CCドーナツ 当店オリジナル（5個入り）','1500','当店のオリジナル商品、CCドーナツは、サクサクの食感が特徴のプレーンタイプのドーナツです。素材にこだわり、丁寧に揚げた生地は軽やかでサクッとした食感が楽しめます。一口食べれば、口の中に広がる甘くて香ばしい香りと、口どけの良い食感が感じられます。');
insert into product VALUES(null,'チョコレートデライト（5個入り）','1600','そこそこ甘いチョコをかけて、いい感じにしたドーナツです。アクセントに白い線を書いてみました。');
insert into product VALUES(null,'キャラメルクリーム（5個入り）','1600','香ばしいドーナツです。キャラメルソースをかけましたが、物足りなかったので生地にもキャラメルを入れてみました。頬も歯もとろける1品になります。');
insert into product VALUES(null,'プレーンクラシック（5個入り）','1500','なんだかんだ、これが一番なんですよ。');
insert into product VALUES(null,'【新作】サマーシトラス（5個入り）','1600','爽やかで青々とした草を混ぜ込んで焼いて、レモンソースをかけてみました。ヨモギ餅が好きな人は好きそうな1品です。');
insert into product VALUES(null,'ストロベリークラッシュ（5個入り）','1800','厳選された酸っぱめのイチゴをドロドロにしたあとに、大量の香料と着色料と砂糖を混ぜ込んだスプレーを散りばめておきました。カラフルですね。');
insert into product VALUES(null,'フルーツドーナツセット（12個入り）','3500','新鮮で豊かなフルーツをたっぷりと使用した贅沢な12個入りセットです。このセットには、季節の最高のフルーツを厳選し、ドーナツに取り入れました。口に入れた瞬間にフルーツの風味と生地のハーモニーが広がります。色鮮やかな見た目も魅力の一つです。');
insert into product VALUES(null,'フルーツドーナツセット（14個入り）','4000','さすがにここまで食べるお客様は中々いないでしょう。当店のスタッフは14個入りを主食としていますが。');
insert into product VALUES(null,'ベストセレクションボックス（4個入り）','1200','4個なんて、すぐ食べちゃいますよ。黙って12個セット買ったほうがいいです。');
insert into product VALUES(null,'チョコクラッシュボックス（7個入り）','2400','空腹状態でチョコクラッシュボックスを注文しようとしていませんか。一旦ご飯を済ましてから検討してください。チョコ専門の偏食家でない限り飽きるボックスです。');
insert into product VALUES(null,'クリームボックス（4個入り）','1400','クリームドーナツの詰め合わせです。実は4個のうち1個のドーナツだけロゼソースを注入しておきました。クリームばかりだと飽きそうと思った社長の思いやりです。決してSNSでバズりたいとかそういう思いはありません。お客様への愛です。');
insert into product VALUES(null,'クリームボックス（9個入り）','2800','クリームドーナツの詰め合わせです。実は9個のうち、２個のドーナツにロゼソース、さらに2個にヤンニョムチキンソースを注入しておきました。クリームばかりだと飽きるかと思った社長の思いやりです。');