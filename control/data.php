<?php
include_once ("control.php");
/*
 * The content of data.php
 * 1. add user
 * 2. login and get the id
 * 3. delete items
 * 4. add friend
 * 5. add group
 * 6. add in group
 * 7. add topics
 * 8. modify the score
 * 9. add feedbacks label
 * 10.add feedbacks note
 * 11.add feedbacks comment
 */
//******************************************add user**************************************************
addUser('花儿无处不在', 'flower', '123456');
addUser('花儿到处都在', 'flower2', '123456');
addUser('新亮', 'xinliang', '123456');
addUser('若楠', 'ruonan', '123456');
addUser('甘骞', 'ganqian', '123456');
addUser('名越', 'mingyue', '123456');
addUser('文琳', 'wenlin', '123456');
addUser('玮键', 'weijian', '123456');
addUser('晓芬', 'xiaofen', '123456');
addUser('小昕', 'xiaoxin', '123456');
addUser('紫珊', 'zishan', '123456');
addUser('程璨', 'chengcan', '123456');
addUser('包子', 'baozi', '123456');
addUser('伊姿', 'yizi', '123456');
addUser('朱琳', 'zhulin', '123456');
addUser('小多', 'xiaoduo', '123456');
addUser('老虎', 'laohu', '123456');
addUser('飞飞', 'feifei', '123456');
addUser('大禹', 'dayu', '123456');
addUser('飞机', 'feiji', '123456');

//******************************************login*****************************************************
$user1 =    login('flower', '123456') -> id;
$user2 =    login('flower2', '123456') -> id;
$user3 =    login('xinliang', '123456') -> id;
$user4 =    login('ruonan', '123456') -> id;
$user5 =    login('ganqian', '123456') -> id;
$user6 =    login('mingyue', '123456') -> id;
$user7 =    login('wenlin', '123456') -> id;
$user8 =    login('weijian', '123456') -> id;
$user9 =    login('xiaofen', '123456') -> id;
$user10 =    login('xiaoxin', '123456') -> id;
$user11 =    login('zishan', '123456') -> id;
$user12 =    login('chengcan', '123456') -> id;
$user13 =    login('baozi', '123456') -> id;
$user14 =    login('yizi', '123456') -> id;
$user15 =    login('zhulin', '123456') -> id;
$user16 =    login('xiaoduo', '123456') -> id;
$user17 =    login('laohu', '123456') -> id;
$user18 =    login('feifei', '123456') -> id;
$user19 =    login('dayu', '123456') -> id;
$user20 =    login('feiji', '123456') -> id;

//********************************deleteItems********************************************************
modify('user', array('PicPath' => "u1739544-4.jpg", 'Info' => "a happy boy"), $user8);
modify('user', array('PicPath' => "u2117077-1.jpg"), $user3);
modify('user', array('PicPath' => "u1860328-24.jpg"), $user4);
modify('user', array('PicPath' => "u3865207-9.jpg"), $user5);
modify('user', array('PicPath' => "u21824670-4.jpg"), $user6);
modify('user', array('PicPath' => "u1254692-10.jpg"), $user7);

//*********************************************add friend*********************************************
addfriend($user8, $user1);
addfriend($user8, $user2);
addfriend($user8, $user3);
addfriend($user8, $user4);
addfriend($user8, $user5);
addfriend($user8, $user6);
addfriend($user7, $user4);
addfriend($user3, $user5);
addfriend($user3, $user6);
addfriend($user9, $user1);
addfriend($user10, $user3);
addfriend($user11, $user5);
addfriend($user12, $user7);
addfriend($user13, $user9);
addfriend($user14, $user11);
addfriend($user15, $user13);
addfriend($user16, $user15);
addfriend($user17, $user16);
addfriend($user17, $user18);
addfriend($user18, $user12);
addfriend($user19, $user14);
addfriend($user20, $user4);
addfriend($user20, $user6);

//*******************************************add group************************************************
$groupId1 = addGroup('AngryBug!!', 'A group from course WEB2.0', $user8);
$groupId2 = addGroup('Computer', '电脑是我们的爱好', $user8);
$groupId3 = addGroup('web2.0编程', '专注使我们走得更远', $user3);
$groupId4 = addGroup('数媒&&电政', '我们关注的方向', $user1);

//******************************************add in group**********************************************
addInGroup($user3, $groupId1);
addInGroup($user4, $groupId1);
addInGroup($user5, $groupId1);
addInGroup($user6, $groupId1);
addInGroup($user7, $groupId1);
addInGroup($user3, $groupId2);
addInGroup($user4, $groupId2);
addInGroup($user4, $groupId3);
addInGroup($user8, $groupId3);
addInGroup($user5, $groupId3);
addInGroup($user9, $groupId2);
addInGroup($user10, $groupId4);
addInGroup($user11, $groupId4);
addInGroup($user12, $groupId4);
addInGroup($user13, $groupId2);
addInGroup($user14, $groupId2);
addInGroup($user15, $groupId3);
addInGroup($user16, $groupId4);
addInGroup($user17, $groupId3);
addInGroup($user18, $groupId3);
addInGroup($user19, $groupId1);
addInGroup($user20, $groupId1);

//******************************************add topics************************************************
$topicId1 = addTopic("少年Pi的奇幻漂流", '一艘孤单小船，一个落难少年，一只孟加拉虎，这是南太平洋上，最艰难的生存考验。《少年pi的奇幻漂流》是作者马特尔的第二部小说，但是一面市便惊艳国际文坛，获奖无数，成为畅销书。小说描写一个印度男孩和一只叫理查德•帕克的孟加拉虎一起在太平洋上漂流227天后获得重生的神奇故事。', 'books/s24223033.jpg', '[加拿大] 扬·马特尔', "扬•马特尔（Yann Martel）
一九六三年出生于西班牙，父母是加拿大人。幼时曾旅居哥斯达黎加、法国、墨西哥、加拿大，成年后作客伊朗、土耳其及印度。毕业于加拿大特伦特大学哲学系，其后从事过各种稀奇古怪的行业，包括植树工、洗碗工、保安等。", "译林出版社", $user3, "http://book.douban.com/subject/20326626/");

$topicId2 = addTopic('慢慢来.一切都来得及', '每个在城市中学习工作的人，都会被这本书深深的打动。在奋斗的道路上，我们都想快起来，快一点成功，快一点过上自己想要的生活。
可是人就是这样的，越是着急，事情越是做不好。工作会拖延，情绪变糟糕，压力让人焦躁。本书的作者meiya跟我们大家一样，独自在城市中努力的奋斗着。她把自己这些情况都写下来，涉及到开始爱好者，空有梦想，不付诸行动、拖延症、注意力涣散症、负面情绪、缺乏运动，身体亚健康等等，分享有效、有趣的解决方法。她和大家一起，练习把心慢下来，让行动快起来。', 'books/s24444729.jpg', 'meiya ', "meiya http://www.douban.com/people/meiyang/ 是豆瓣网上的一位大红人。她在上海的一家广告公司工作。80后双子座女生，热爱写作、阅读、跑步、旅行和美食。她独自在城市里孤独奋斗的同时，不忘享受生命。她把美好的生命体验记录下来，也把自己时常会有的压力、焦躁、急迫感和不安全感写下来，引起广大网友的强烈共鸣。","中国商业出版社", $user7, "http://book.douban.com/subject/20389195/");

$topicId3 = addTopic("寡人有疾", "《寡人有疾》一共有三个故事，第一个故事叫《诗人与医 院》，讲唐朝诗人卢照邻，得了麻风病，遇到医圣孙思邈，虽然治不好病，但诗人信奉孙思邈的哲学；第二个故事叫《蒙古兵和瘟疫》，蒙古入侵开封之前，开封城里闹瘟疫，名医李东皋控制住了瘟疫，蒙古兵随后杀进了城；第三个故事的背景在民国时期，名字叫《父与子》，一个从美国留学回来的医生，用现代化的医疗手段，治死了他的父亲。", 'books/s23127970.jpg', '苗炜', "苗炜，1968年出生，北京人。现为《三联生活周刊》副主编。已出版《让我去那花花世界》《除非灵魂拍手作歌》《黑夜飞行》。《寡人有疾》是他2012年最新长篇小说。", "湖南文艺出版社", $user6, "http://book.douban.com/subject/19987957/");

$topicId4 = addTopic("莎士比亚书店", "《莎士比亚书店》被誉为世界上最美的书店之一，也是巴黎的文化地标和全世界独立书店的标杆，至今仍让全世界的爱书人津津乐道。从它诞生开始，就在机缘巧合下吸引了乔伊斯、海明威、菲茨杰拉德、纪德、拉尔博、瓦乐希、安太尔等作家与艺术家，不仅成为英语和法语文学交流的重心，也是当时美国迷惘的一代流连忘返的精神殿堂。本书是书店创办者毕奇小姐的回忆录，书中不仅讲述了书店经营中的欢喜、哀愁、成就、遗憾和与很多知名作家交往中的细节，也讲述了二十世纪二三十年代里的文化和社会变迁。作为时代的见证者，莎士比亚书店和它的缔造者毕奇小姐都已成为永远的传奇。", "books/s24430378.jpg", " [美] 西尔薇娅·毕奇", "西尔维娅·毕奇（Sylvia Beach，1887－1962）。毕奇小姐1887年出生于美国巴尔的摩。1919年，她在巴黎左岸开了英文书店《莎士比亚书店》。1922年，她以莎士比亚书店的名义，为乔伊斯出版了英美两国列为禁书的巨著《尤利西斯》，因而名噪一时。然而在盗版、 战争、经济萧条的威胁下，1933年开始书店多次面临困境，还好在法国艺文界的支持下，仍继续经营了下来。1941年，她因拒绝卖给德国纳粹军官珍藏的最后一本《芬尼根守灵记》而受到威胁，不得不将书店关门。随后，因美国加入对纳粹德国的作战，毕奇小姐因为是美国人而被纳粹逮捕，投送进集中营。出狱后她已无心再开书店。到1951年，在得到她的授权后，乔治·惠特曼先生在巴黎开了一家书店，取名叫《莎士比亚书店》。1956年，毕奇小姐写下自传作品《莎士比亚书店》。1962年，她逝世于巴黎。", "光明日报出版社", $user6, "http://book.douban.com/subject/20395169/");

$topicId5 = addTopic("哈尔的移动城堡", "宫崎骏杰作《哈尔的移动城堡》小说原著 英国幻想文学大师戴安娜•韦恩•琼斯杰作 索菲是三姐妹中的老大，命运待她并不好。除非她离家寻找自己的命运，否则注定悲剧性地失败。可当索菲无意间惹怒了荒地女巫后，她发现自己被施了一个可怕的咒语，变成了一个老太婆。破除咒语唯一的希望就在山上永动的移动城堡：哈尔巫师的城堡。为了破解妖术，索菲必须应付没心没肺的哈尔，和火魔达成契约，直面荒地女巫。一路走来，她重新认识了哈尔——和她自己。", 'books/s24419888.jpg', ' [英]戴安娜•韦恩•琼斯', "戴安娜•韦恩•琼斯（1934－2011）是杰出的幻想小说作家，写作出色的幻想小说已有三十多个年头。凭借漫无边际的想象力，她的故事糅合了精彩的情节，热情的幽默感，和动人的真理，为各年龄层的读者所喜欢。她的作品受到国际褒奖并获得了一系列荣誉，包括两次 波士顿环球报号角书奖 以及英国幻想协会卡尔•爱德华•瓦格纳奖——以肯定她在幻想文学领域的重大影响。著名导演动画家宫崎骏改编了《哈尔的移动城堡》，拍摄成一部出色的电影，获得了奥斯卡奖提名。", "人民文学出版社", $user9, "http://book.douban.com/subject/20273030/");

$topicId6 = addTopic("上面很安静", "故事发生在荷兰的乡间。亨克和赫尔默是一对双胞胎兄弟，弟弟亨克勤于农活，深受父亲欢心，哥哥赫尔默不喜欢农场，渴望去城市生活，因此与父亲关系疏远。谁料，年轻的弟弟在一场车祸中丧生，一心想离开农场的赫尔默被迫中断大学学业，从此与 牛羊为伍。三十年单调无变化的生活，除了四季的轮替，宛若一张白纸，连时间都停滞了。这期间，母亲离世，父亲年老体衰、卧床不起，冷漠疏离的父子关系不仅没有修复，而且日趋恶化。得不到父亲宠爱、仿佛总是活在亨克阴影下的赫尔默，在弟弟身亡之后，非但没有摆脱影子人的身份、建起独立的自我，反而跌入更深的虚空中，找不到人生存在的实质意义。一日，亨克生前女友丽特的来信，给赫尔默死水般的生活激起一丝涟漪：早已嫁人生子的丽特，请求赫尔默接纳自己无所事事的儿子到农场帮工……", 'books/s24448633.jpg', '[荷兰] 赫布兰德·巴克 Gerbrand Bakker', "赫布兰德·巴克（Gerbrand Bakker），荷兰作家，一九六二年出生，曾在阿姆斯特丹大学荷兰语及荷兰文学系学习历史语言学。一九九五年到二○○二年为电影翻译字幕。二○○六年在阿尔克马尔完成园艺学。二○○七年九月，成为报纸《绿色阿姆斯特丹人》的专栏作家。此前出版过一部青少年小说《梨树盛开白花》（Pear Trees Bloom White），《上面很安静》是他首部成人小说，二○○六年在荷兰出版后，荣获诸多奖项，包括金驴耳奖、AKO文学奖，成为当地畅销书；二○○九年在美国出版后，随即入选 国际IMPAC都柏林文学奖 ，并于二○一○年获得这一世界上奖金最高的单一文学奖。", "人民文学出版社", $user10, "http://book.douban.com/subject/19985023/");

$topicId7 = addTopic("一觉睡到小时候", "《一觉睡到小时候》立足于小时光专栏，收入各自独立成篇、又前后呼应的近50篇成长小说，所写内容涉及到童年的游戏、玩具、影视、校园、饮食、情感等童年生活的所有元素，各种二、各种丑、各种治愈、各种撒欢儿大集结。它不只是一本怀旧、治愈系小说，更是都市人、奋斗者、年轻人面对忧伤的现实，慢慢麻木的存在感，返身向后寻找纯真的、无忧无虑的童年的一种怀念，一种回味。", 'books/s24428619.jpg', '巩高峰 著 / 六弌 插画', "专栏作者，杂志编辑，靠谱青年。忙时固执卖命，闲时吐槽卖萌，常年爱 做梦，偶尔狠 懒惰。专栏和随笔多见于《南方人物周刊》《三联生活周刊》《大学生》等。养过小说集《一只不符合审美标准的猫》。", "安徽人民出版社", $user11, "http://book.douban.com/subject/20391459/");

$topicId8 = addTopic("爱情与其他发明", "有关生命和爱。爱是我们的发明，每一种发明都让人类得以前行。一个男人能爱许多女人，韦小宝已经证明这一点；但一定有一个是他最爱，一定有这么一个，这个韦小宝没有证明，但杨过证明了的。人就要去追求那个他最爱的人，退而求其次可耻，不真诚，不算真爱。没有真爱的人生将不能波澜壮阔……爱就是这样奇怪，不爱不精彩。但你除了爱人，也可以爱这个世界，爱发明（发明了爱，然后继续爱你所发明的，甚至只是爱读书写作。", 'books/s24462001.jpg', '小饭', "小饭 80后作家，出生于上海，毕业于华东师范大学哲学系。曾在《收获》《十月》《萌芽》等期刊发表小说；曾获《上海文学》 全国文学新人大赛 短篇小说奖； 《青年文学》文学新人奖；出版有《不羁的天空》《我的秃头老师》《毒药神童》《我年轻时候的女朋友》《蚂蚁》《爱近杀》等。", "中国华侨出版社", $user12, "http://book.douban.com/subject/20393130/");

$topicId9 = addTopic("城市的胜利", "城市是诞生奇迹之所 是人类最伟大的发明与最美好的希望 是最健康、最绿色、最富裕、最宜居的地方 如果你热爱自然，请搬到摩天大楼里；如果你热爱地球，请搬到城市里。芝加哥大学博士、哈佛大学经济学教授、当代顶尖经济学家爱德华•格莱泽自小生长在曼哈顿，长期沉醉于城市研究与写作的他带领着自己的团队进行了强大的全球城市调研，最终得出了令人毋庸置疑的结论：城市是人类最伟大的发明与最美好的希望，城市的未来将决定人类的未来！在《城市的胜利》一书中，格莱泽教授带领读者穿越人类历史、游历世界各地，并将经济与历史完美对接，展现了城市存在的优势及其为人类提供的福祉。城市让人类变得亲密，让观察与学习、沟通与合作变得轻而易举，极大地促进了思想撞击、文化交流与科技创新；城市鼓励创业，带给人们前所未有的工作机会，使得社会的机动性和经济的灵活性得以发挥；城市中密集的高层建筑、发达的公...", 'books/s24472878.jpg', '【美】爱德华•格莱泽', "爱德华•格莱泽（Edward Glaeser），芝加哥大学博士、哈佛大学经济学教授，陶布曼国家和地方政府研究中心主任、拉帕波特大波士顿研究所负责人、曼哈顿研究中心高级研究员，《城市期刊》（City Journal）特约编辑。格莱泽侧重于从经济学角度去研究城市、住宅、种族隔离、肥胖、犯罪、创新等课题，并为《纽约时报》的博客Economix撰写过大量有关此类主题的文章。", "上海社会科学院出版社", $user13, "http://book.douban.com/subject/20373351/");

$topicId10 = addTopic("我的路7", "愿这些故事，给你冬天里一杯热茶的温暖。V先生继续旅行。他将讲述7个故事：《追逐星光》的造梦师，漂浮着《言之石》的异空间，被遗忘的小岛唱着《岛歌》，《怪兽》心里埋着梦想的种子，《克莱图书馆》里，有人曾用生命守护珍藏，追梦能量可以召唤来《彩虹兽》，一张旧照片，是老人记 忆深处的《光》。
寂地《我的路 7》灿若繁星，2012年世界末，与你相约。愿繁星点点，璀璨星空。《灿若繁星》宣传短片请访问：http://v.youku.com/v_show/id_XNDg5MjY4MjMy.html", 'books/s24481014.jpg', '寂地', "寂地-情感色彩魔术师，温暖心灵的绘本漫画家。代表作品：《我的路 My Way》系列 《MY WAY》系列绘本漫画，从2004年至今共出版7册及2册精装本。《MY WAY》以温暖心灵的小故事为读者讲述生活的哲理。寂地用其温暖纯净的画风，清新感人的文字，为大家讲述人生旅途中的种种感悟。《MY WAY》系列多次蝉联内地绘本类漫画销量冠军，授权至法国，马来西亚等国家地区，获得诸多华人动漫奖项。", "黑龙江美术出版社", $user14, "http://book.douban.com/subject/20435568/");

$topicId11 = addTopic("阿宅的奇幻事务所", "《阿宅的奇幻事务所》为中文界《魔戒》第一推手朱学恒笔下的奇幻世界。那些就发生在身边的恐怖传说和恶魔故事，它的真相是什么？它们是怎样流传的？阴暗的马桶里躲着凶残暴躁的肉食蜘蛛；独自开车，后座上却坐着你不知道的幽灵；独自在寝室，夜半时分听到奇怪的声音；旅馆的房间，床下藏着你不知道的尸体；派对上遇到美女搭讪，以为碰上艳遇，第二天醒来发现少了一个肾脏；……", 'books/s24477414.jpg', '朱学恒', "朱学恒，1975年生，台湾著名翻译家、作家。他翻译了《魔戒》三部曲、《魔戒前传：哈比人历险记》、《哈利·波特》系列、《星际大战》系列、《龙枪传奇》、《龙枪编年史》等超人气魔幻著作。", "凤凰出版社", $user15, "http://book.douban.com/subject/11541367/");

$topicId12 = addTopic("因自由而美丽", "本书是黎戈的最新作品集，四年以来的散文、随笔、文艺评论合集。包括淡夏,纸游,物喜,我城,静语五部分，内容涉及生活、阅读、电影、植物、食物、南京等。写细节入生活内质，恰到好处；写日常则绵密细致、冲淡平和；写阅读则深情凌厉，灵气逼人。", 'books/s24479156.jpg', '黎戈', "黎戈，女，70后。金陵人士。日常与文字无涉。嗜好阅读，勤于动笔。长期为多家媒体专栏供稿，作品散见于《人民文学》《今天》《鲤》等刊物。前作《私语书》在文艺圈广为称颂。", "新星出版社", $user16, "http://book.douban.com/subject/20433605/");

//******************************************modify the score************************************************
modify('topic', array('Score' => 100), $topicId1);
modify('topic', array('Score' => 200), $topicId2);
modify('topic', array('Score' => 120), $topicId3);
modify('topic', array('Score' => 150), $topicId4);
modify('topic', array('Score' => 210), $topicId5);
modify('topic', array('Score' => 550), $topicId6);
modify('topic', array('Score' => 330), $topicId7);
modify('topic', array('Score' => 560), $topicId8);
modify('topic', array('Score' => 760), $topicId9);
modify('topic', array('Score' => 150), $topicId10);
modify('topic', array('Score' => 650), $topicId11);

//******************************************add feedbacks label*********************************************
addFeedback('label', '社会', 'so good', $user8, $topicId1);
addFeedback('label', '安全', 'so good', $user3, $topicId1);
addFeedback('label', '社区', 'so good', $user4, $topicId1);
addFeedback('label', '魔幻', 'so good', $user3, $topicId2);
addFeedback('label', '好看', 'so good', $user4, $topicId2);
addFeedback('label', '给力', 'so good', $user8, $topicId2);
addFeedback('label', '历史', 'so good', $user5, $topicId3);
addFeedback('label', 'IT', 'so good', $user6, $topicId4);
addFeedback('label', '小说', 'very good', $user7, $topicId5);
addFeedback('label', '漫画', 'not so good', $user8, $topicId5);
addFeedback('label', '随笔', 'some good', $user9, $topicId5);
addFeedback('label', '散文', 'haha', $user10, $topicId5);
addFeedback('label', '日本文学', 'bad', $user6, $topicId6);
addFeedback('label', '绘本', 'very bad', $user7, $topicId6);
addFeedback('label', '推理', 'so good', $user9, $topicId6);
addFeedback('label', '青春', 'so good', $user11, $topicId6);
addFeedback('label', '科幻', 'so good', $user12, $topicId6);
addFeedback('label', '武侠', 'so good', $user20, $topicId7);
addFeedback('label', '言情', 'so good', $user19, $topicId7);
addFeedback('label', '奇幻', 'so good', $user18, $topicId7);
addFeedback('label', '历史', 'so good', $user17, $topicId7);
addFeedback('label', '哲学', 'so good', $user16, $topicId7);
addFeedback('label', '传记', 'so good', $user15, $topicId7);
addFeedback('label', '设计', 'so good', $user14, $topicId7);
addFeedback('label', '建筑', 'so good', $user13, $topicId7);
addFeedback('label', '电影', 'so good', $user11, $topicId7);
addFeedback('label', '回忆录', 'so good', $user8, $topicId7);
addFeedback('label', '音乐', 'so good', $user9, $topicId7);
addFeedback('label', '旅行', 'so good', $user7, $topicId8);
addFeedback('label', '励志', 'so good', $user1, $topicId8);
addFeedback('label', '职场', 'so good', $user3, $topicId8);
addFeedback('label', '教育', 'so good', $user15, $topicId8);
addFeedback('label', '美食', 'so good', $user19, $topicId8);
addFeedback('label', '生活', 'so good', $user4, $topicId8);
addFeedback('label', '灵修', 'so good', $user16, $topicId9);
addFeedback('label', '健康', 'so good', $user6, $topicId9);
addFeedback('label', '家居', 'so good', $user17, $topicId10);
addFeedback('label', '经济学', 'so good', $user11, $topicId11);
addFeedback('label', '管理', 'so good', $user10, $topicId12);
addFeedback('label', '金融', 'so good', $user19, $topicId12);
addFeedback('label', '企业史', 'so good', $user14, $topicId12);

//******************************************add feedbacks note*********************************************
addFeedback('note', '第0页', "其实我看不懂", $user5, $topicId1);
addFeedback('note', '第0页', "超好看", $user7, $topicId2);
addFeedback('note', '第159页', "现在我们的厄运似乎不可动摇，人们对政府的信心可谓丧失殆尽，所有人都感到他被笼罩在即将到来的灾难的阴影中。在一片悲观情绪中，人们相互斥骂指责，但却发现无路可走，他们到政府工作只是为了捞取个人好处，根本不是全心全意地支持政府，这就是我们的危险所在。如果我们不能重新振作士气，如果我们不能重新获得信心，政府真的要完了", $user6, $topicId3);
addFeedback('note', '第521页', "他承认，当他面临死亡时，他可能更愿相信存在来世。-我愿意认为，在一个人死后有些什么东西依然存在。-他说，-如果你积累了所有这些经验，可能还有一点智慧，然后这些就这么消失了，会有些怪怪的。所以我真的愿意相信，会有些什么东西留存下来，也许你的意识会不朽。- 他沉默了很长时间。-但是另一方面，也许就像个开关一样。-他说，-啪！然后你就没了。- 他又停下来，淡然一笑。-也许这就是为什么我从不喜欢给苹果产品", $user8, $topicId4);
addFeedback('note', '第0页', "其实我看不懂", $user6, $topicId5);
addFeedback('note', '第2页', "其实我看懂", $user9, $topicId5);
addFeedback('note', '第4页', "其实看不懂", $user12, $topicId5);
addFeedback('note', '第6页', "死了人就是死了人", $user16, $topicId6);
addFeedback('note', '第12页', "雷布思想起了弗朗什镇大屠杀中幸存下来的女孩", $user17, $topicId6);
addFeedback('note', '第45页', "也可以搜集法庭证据", $user4, $topicId6);
addFeedback('note', '第1页', "面公寓的二楼住着两个小孩子", $user7, $topicId7);
addFeedback('note', '第34页', "起人们热情的原因之一", $user9, $topicId7);
addFeedback('note', '第34页', "你自己会成为整个案件的一部分", $user3, $topicId7);
addFeedback('note', '第56页', "他并没有见过她", $user10, $topicId7);
addFeedback('note', '第12页', "或者质疑人们的陈述", $user11, $topicId7);
addFeedback('note', '第3页', "他常从这个窗口观察他们", $user17, $topicId7);
addFeedback('note', '第6页', "基布瓦纳是他的学", $user16, $topicId7);
addFeedback('note', '第8页', "野兔去了猎人家", $user9, $topicId7);
addFeedback('note', '第5页', "老师的妻子叫基布瓦纳过来", $user2, $topicId8);
addFeedback('note', '第43页', "是你自己决定要来的", $user4, $topicId9);
addFeedback('note', '第67页', "野兔领着他回到她家", $user5, $topicId9);
addFeedback('note', '第76页', "偏偏在我的眼前", $user11, $topicId10);
addFeedback('note', '第34页', "你不会希望你将来的孩子也变成傻瓜吧", $user10, $topicId11);
addFeedback('note', '第345页', "当当网上关于此书的信息几乎处处迎合了我的各项似乎提不上台面的恶趣味", $user8, $topicId11);
addFeedback('note', '第356页', "才觉得这书真是大大超乎我的", $user9, $topicId11);
addFeedback('note', '第45页', "风格魔幻的女权主义作家", $user4, $topicId11);
addFeedback('note', '第34页', "飞向另一个世界", $user3, $topicId12);
addFeedback('note', '第56页', "反正我更愿意先把她看做一个童话采集者", $user8, $topicId12);
addFeedback('note', '第23页', "一个感受层面", $user19, $topicId12);
addFeedback('note', '第36页', "去寻找力量改变现实的面貌", $user14, $topicId12);
addFeedback('note', '第643页', "反正我更愿意先把她看做一个童话采集者2", $user15, $topicId12);

//**************************************add feedbacks comments*********************************************
addFeedback('comment', '个人感觉', "死亡如此紧紧地跟随着生命，并不是因为生命的需要，而是因为嫉妒。生命太美了，死亡爱上了它，这是一种充满了嫉妒心和占有欲的爱，它紧紧抓住所有抓到的一切。但是生命轻盈地越过死亡，只失去了一两样不重要的东西。沮丧只是云朵飘过时投下的阴影，很快便消失了。", $user3, $topicId1);
addFeedback('comment', '个人感觉', "那么我们就会在不加修饰的真实的祭坛上牺牲了我们的想象力。最终我们就会没有任何信仰，我们的梦想就会变得毫无价值。 原文 then we sacrifice our imagination on the altar of crude reality and we end up believing in nothing and having worthless dreams. 在粗粝现实中廉价牺牲想象力，归入毫无信仰、梦想幻灭之境地… ", $user3, $topicId1);
addFeedback('comment', '想到达明天，现在就要起程', "不知道每个人怎样想，至少在我，总是会去思考：嘿，哥们，你以后毕业了干嘛去啊？然后总是在心里想，我以后一定要干嘛干嘛，一定要完成自己的梦想。可是梦想到底是什么呢，一次间隔年？又或者是做义工？ 在你成长的道路上，竭尽自己的所能，而不是一味地去憧憬半年，甚至一年以后的事情，那才是人生。不要总想着我以后要干嘛干嘛，而是努力呆在自己想呆的地方，努力去做自己想做的事情。", $user4, $topicId2);
addFeedback('comment', '第一个书评', "它如此重大，所以我没把它当回事儿 2011年4月1日，愚人节，我开始写《寡人有疾》，人到中年，不好意思再按文学青年的套路写，希望自己能写点儿严肃的东西。", $user8, $topicId3);
addFeedback('comment', '莎士比亚书店书评', "自从出版了乔伊斯的《尤利西斯》后，毕奇女士的莎士比亚书店就成了乔伊斯的个人事务代理所，来往书信、收支账务、订购图书，乔伊斯的事儿总是忙不完，更甚的是，每临近周末，乔伊斯总会拿出一大堆事来，但是毕奇女士说：我可以为乔伊斯做任何事，但是我周末必须休假！几乎每个周末，她都要和乔伊斯论战一番后才能赶火车去郊外的山区。在乔伊斯咄咄逼人的气势下，毕奇女士还能做出此等反击，也实在让人佩服。天才大多有臭脾气，他们那唯我独尊特立独行不可一世的性格，没几个人能受得了。", $user5, $topicId4);
addFeedback('comment', '原来', " 尽管看过了译作，再看英文原著，还是觉得阅读很困难。原著的完成年代也算是有点久了，有些文法已经不大流行了，会对习惯了新近英文小说的人的阅读语感造成点小停顿。（看来我要多点阅读英语才行。）", $user3, $topicId5);
addFeedback('comment', '好吧', "比动画更赞，我果然还是偏好文字。幸好我是先看了电影再看了小说,不然也会很挑剔唠叨，同感觉得城堡的改编满失败的，虽然画面一如既往地让人感动，但是真正小说中那种感觉却完全没有表达出来，感觉小说中的苏菲更成熟. ", $user4, $topicId5);
addFeedback('comment', '想买', "哪里可以买得到呢，很希望这样的文章，看见封面弄的不错。", $user14, $topicId6);
addFeedback('comment', '我知道你不知道自己再想什么', "　我也很感兴趣。我看卓越上有，图书信息没错的，但是没有封面照片，可能是刚出的书吧，信息不全，你可以去看看。", $user8, $topicId6);
addFeedback('comment', '小小姑娘', "　前日睡梦中一翻身，啪 的一声掉到了地板上，冬日里冰凉的地板带来的寒意是次要的，重要的是我发现在自己掉下来的时候扭到了脖子。呜呼，痛死哀家了。 ", $user9, $topicId7);
addFeedback('comment', '好小猫', "《一觉睡到小时候》是作者巩高峰-小时光专栏文字的一次集合，全书以五十多篇小为标题的文字，串起了一段难忘的童年乡村生活。文字平实亲切，记叙朴拙自然，辅以充满稚趣的插画，令人仿佛随作者一起来到了他成长的小小乡村，跟着他一起打闹嬉戏、调皮捣蛋，体验各种儿时才有的快乐与明媚，以及成长之中所经历的小小忧伤。", $user11, $topicId7);
addFeedback('comment', '新上榜', "说白了，这不算是一本好读的书（当然不好读并不代表不好看和不好玩），不好读是因为它并不容易让人轻松投入到故事里，至少我用了大约两天时间才读毕。", $user14, $topicId8);
addFeedback('comment', '好吧嗯嗯', "作为绝大部分生活都在城市中度过的城市土著，我对城市这一话题向来很有兴趣。之前社科文献出版社的 城市译丛 也读了数本，自诩对这个领域有所了解。因此，爱德华·格莱泽这本《城市的胜利》早在其英文版推出时就已经吸引了我的注意。由于和引进本书的图书公司关系不错，我从去年年底就已经得知本书的引进计划（实际上我还帮忙翻译了本书开头部分及封底的国外媒体及读者评论）。", $user19, $topicId9);
addFeedback('comment', '召集', "最近召集了几次名为 N城记 的主题沙龙，邀请在不同国家不同城市中生活过的朋友畅聊现实中的、已经消失的和不存在的城市，场面之热烈超乎想象。沙龙的方案是这样写的：城市是看不见实体的罩子，我们中的大多数把整个人生都放进去，却不了解它的材质和样子。周末午后，趁它们打盹的时候，来秘密地揭一下它们的老底，顺便想象一下，过去或未来，那些我们愿意栖身至死的城市的样子。", $user20, $topicId9);
addFeedback('comment', '我的路在何方', "《追逐星光》的造梦师，漂浮着《言之石》的异空间，被遗忘的小岛唱着《岛歌》，《怪兽》心里埋着梦想的种子，《克莱图书馆》里，有人曾用生命守护珍藏，追梦能量可以召......... ", $user2, $topicId10);
addFeedback('comment', '猫', "《追逐星光》的造梦师，漂浮着《言之石》的异空间，被遗忘的小岛唱着《岛歌》，《怪兽》心里埋着梦想的种子，《克莱图书馆》里，有人曾用生命守护珍藏，追梦能量可以召......... ", $user3, $topicId10);
addFeedback('comment', '猫猫', "《追逐星光》的造梦师，漂浮着《言之石》的异空间，被遗忘的小岛唱着《岛歌》，《怪兽》心里埋着梦想的种子，《克莱图书馆》里，有人曾用生命守护珍藏，追梦能量可以召......... ", $user1, $topicId10);
addFeedback('comment', '心理学', "沿河逃跑的时候，我确实回了一次头。那光景真是难忘，但是……该如何形容呢？倘若我有点美术细胞，兴许会表达得准确些吧。", $user6, $topicId10);
addFeedback('comment', '那些你不敢问的秘密', "虽然最近比较火爆的玛雅末日预言传说已经过了有效期，但是回想它之前对人们生活造成的影响之深，不得不唏嘘感慨人类面对自然力量的弱小与无助。在我看来，正是由于很多人疏远科学，趋信迷信，所以才有人会恐慌，甚至做出愚昧可笑的行为。那么既然平安度过了世界末日，我们是不是应该反思一下，为什么当我们面对无法证实的传说时，就会表现得手足无措？是不是也应该了解一下那些传说的渊源是什么？到底是否可信？ ", $user8, $topicId11);
addFeedback('comment', '荒谬中的真实', "前两天豆瓣上有个关于护士YY出的蛔虫斗情敌的文章引得叫好声一片，但很快就有人反应过来那种蛔虫入体吐一地的场景在现实生活中是不可能发生的。文章的重口味程度和曾经风靡网络的泡面胃、内裤蛆虫等具有异曲同工之妙，这个故事几经修改，在多年以后极有可能会形成一股新的都市传说风潮。 ", $user9, $topicId11);
addFeedback('comment', '传说与真相', "人说天蝎座的人对于神秘事件最感兴趣，就我自身来说，此言非虚。在小时候我就莫名其妙对神神鬼鬼的事儿既怕又爱，很是让父母伤了脑筋，一直到高中，因为住的是平房，所以每次去厕所还得爸爸或者妈妈在厕所外陪着才行。 ", $user12, $topicId11);
addFeedback('comment', '爱读黎戈的书', "阅读黎戈的书，总能让人感到开卷有益。 她的文字令人耳目一新，不但呈现文字之美，而且叙事言情皆有独到之处，使人尽情享受阅读的快乐。作为读者，我爱读黎......... ！", $user19, $topicId12);
addFeedback('comment', '未读便已期待', "之前买了一本《私语书》，暗想为何在卓越上依旧不算便宜，况且又是小众的书。看了这些所谓的读书笔记后，大感自己在文学方面实在是一无所知。.......", $user18, $topicId12);
addFeedback('comment', '人淡如菊', "拜读过黎戈的文字，如她的为人一样淡雅脱俗。字里行间总是那样的灵动清新、平实深邃。每当我感到沮丧、迷茫， 看看她的文字，我总能释然! ", $user13, $topicId12);
?>