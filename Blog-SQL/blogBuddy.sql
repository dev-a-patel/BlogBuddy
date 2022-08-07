-- phpMyAdmin SQL Dump
-- version 5.3.0-dev+20220715.346923e20a
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 23, 2022 at 12:23 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `username` varchar(60) DEFAULT NULL,
  `liked` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `likes`
--

INSERT INTO `likes` (`id`, `post_id`, `user_id`, `username`, `liked`) VALUES
(627, 29, 59, 'Thor ', 1),
(628, 29, 62, 'Dr. Strange', 1),
(629, 25, 62, 'Dr. Strange', 1),
(630, 25, 33, 'Admin', 1),
(631, 32, 60, 'Dev', 1),
(632, 36, 60, 'Dev', 1),
(633, 34, 60, 'Dev', 1),
(634, 25, 60, 'Dev', 1),
(635, 29, 60, 'Dev', 1),
(636, 29, 34, 'Author', 1),
(637, 25, 34, 'Author', 1),
(638, 29, 33, 'Admin', 1),
(639, 32, 33, 'Admin', 1),
(640, 38, 34, 'Author', 1),
(641, 32, 34, 'Author', 1),
(642, 33, 34, 'Author', 1),
(643, 39, 34, 'Author', 1),
(644, 37, 34, 'Author', 1),
(645, 24, 33, 'Admin', 1);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `username` varchar(60) NOT NULL,
  `topic_id` int(11) DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `published` tinyint(4) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `likes` int(11) NOT NULL,
  `views` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `user_id`, `username`, `topic_id`, `title`, `image`, `body`, `published`, `created_at`, `likes`, `views`) VALUES
(21, 61, 'Jack', 20, 'The Impact of covid\'19 on the Indian economy & our live', '1658285375_world-closed.jpg', '&lt;p&gt;The Impact of covid&#039;19 on the Indian economy &amp;amp; our lives The Impact of covid&#039;19 on the Indian economy &amp;amp; our lives The Impact of covid&#039;19 on the Indian economy &amp;amp; our lives The Impact of covid&#039;19 on the Indian economy &amp;amp; our lives The Impact of covid&#039;19 on the Indian economy &amp;amp; our lives&lt;/p&gt;&lt;p&gt;&amp;nbsp;&lt;/p&gt;&lt;p&gt;It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using &#039;Content here, content here&#039;, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for &#039;lorem ipsum&#039; will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).&lt;/p&gt;&lt;p&gt;&amp;nbsp;&lt;/p&gt;&lt;p&gt;Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of &quot;de Finibus Bonorum et Malorum&quot; (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, &quot;Lorem ipsum dolor sit amet..&quot;, comes from a line in section 1.10.32.&lt;/p&gt;&lt;p&gt;The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from &quot;de Finibus Bonorum et Malorum&quot; by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.&lt;/p&gt;', 0, '2022-07-13 18:09:38', 0, 0),
(24, 62, 'Dr. Strange', 18, 'Nature and its beauty to embrace', '1657767640_mountain-lake-view-boris-baldinger.jpg', '&lt;p&gt;Nature is the most divine creation of god around us, it is considered an integral part of mankind. Nature has bestowed us with water, air, plants and much more to make us survive on this planet. But are we paying back to our mother nature? The answer is no as we have not only failed in paying back but also exploited nature to a great extent.&lt;/p&gt;&lt;p&gt;Nature provides beauty all around, it&rsquo;s the nature that makes the surroundings attractive and worthy to live in. Human life is possible because of nature and its various boons. Mother nature is a gift of God and must be respected just like we respect and love our mothers.&lt;/p&gt;&lt;p&gt;Nature is a unique blessing to us, everything created by God on this earth has some purpose and order in life. The radiant rivers, the shining valleys, huge mountains, blue oceans, white sky, the sun, the rain, the moon and the list is non-ending. All these things have some order and serve a purpose in life. Despite all this, we are still doing activities that are not only harmful but can cause real devastation to nature all around.&lt;/p&gt;&lt;p&gt;There are numerous creatures on this planet and every single creature serves a defined purpose in the ecosystem. Humans, on the other hand, are trying to disturb this ecosystem by entering into the places and things they are not supposed to enter. They are creating an imbalance in the ecological cycle of the environment and thus creating havoc all around.&lt;/p&gt;&lt;p&gt;&amp;nbsp;&lt;/p&gt;&lt;p&gt;Everything we do is dependent on nature. In fact, our life is possible because of this beautiful nature. We depend on water, air, fire for our survival and then again we are exploiting the same things we completely rely on.&lt;/p&gt;&lt;p&gt;We, humans, are continuously abusing our mother nature and are not even thinking about its consequences. Development is a slow process and destruction can be done in a wink of an eye.&lt;/p&gt;&lt;p&gt;It&rsquo;s the need of an hour to conserve our nature so that our generations can also enjoy and cherish in the beauties of nature. We need to create awareness among people to stop this continuous process of destruction. Human activities must be done in a sustainable way to ensure the development of a nation without causing any harm to our mother nature. It is essential to understand that we should not take advantage of some of the finest blessings of god-nature.&lt;/p&gt;', 1, '2022-07-14 08:30:25', 1, 1),
(25, 30, 'Dev', 17, 'Rupee falling against USD ($). Challenges and Merits', '1657881504_Rupee-Kneeling-to-Dollar-Again_.jpg', '&lt;p&gt;The value of the Indian rupee to the US Dollar works on a demand and supply basis. If there is a higher demand for the US Dollar, the value of the Indian rupee depreciates and vice-versa.&amp;nbsp;&lt;/p&gt;&lt;p&gt;&amp;nbsp;&lt;/p&gt;&lt;p&gt;If a country imports more than it exports, then the demand for the dollar will be higher than the supply and the domestic currency like Rupee in India will depreciate against the dollar.&amp;nbsp;&lt;/p&gt;&lt;p&gt;The rupee&#039;s fall these days is mainly due to high crude oil prices, a strong dollar overseas, and foreign capital outflows.&amp;nbsp;&lt;/p&gt;&lt;p&gt;The rupee has been on the decline since early this year, especially after supply chain disruptions in view of the Russia-Ukraine war, &amp;nbsp;global economic challenges, inflation, and high crude oil prices, among other issues.&amp;nbsp;&lt;/p&gt;&lt;p&gt;Besides, there have been heavy foreign fund outflows from the domestic markets as the foreign institutional investors (FIIs) have sold shares worth $28.4 billion so far this year, outstripping the $11.8-billion sell-off seen during the Global Financial Crisis of 2008. The rupee has depreciated 5.9 per cent versus the dollar so far this calendar year.&amp;nbsp;&lt;/p&gt;&lt;p&gt;As money flows out of India, the rupee-dollar exchange rate gets impacted, depreciating the rupee. Such depreciation puts considerable pressure on the already high import prices of crude and raw materials, paving the path for higher imported inflation and production costs besides higher retail inflation.&amp;nbsp;&lt;/p&gt;&lt;p&gt;Meanwhile, the US Federal Reserve recently increased the interest rates, and the return on dollar assets increased compared with those of emerging markets such as India. Speculations are there could me more aggressive rate hikes by the US Fed and that may further dent the Indian currency.&amp;nbsp; &amp;nbsp;&amp;nbsp; &lt;strong&gt;How does a weak rupee impact you and the economy?&amp;nbsp;&lt;/strong&gt;&lt;/p&gt;&lt;p&gt;Since India mostly depends on imports, including crude oil, metals, electronics, etc. the country makes payments in US dollars. Now if the rupee is weak, it has to pay more for the same quantity of items. In such cases, the cost of raw materials and production goes up which gets passed on to the consumers.&lt;/p&gt;&lt;p&gt;&amp;nbsp;&lt;/p&gt;&lt;p&gt;On the other hand, a weakening domestic currency boosts exports as shipments get more competitive and foreign buyers gain more purchasing power. However, in the current scenario of weak global demand and persistent volatility, exporters are not supportive of the currency fall.&lt;/p&gt;&lt;p&gt;The falling rupee&#039;s biggest impact is on inflation, given India imports over 80 per cent of its crude oil, which is the country&#039;s biggest import. The global crude prices have sustained at over $100 a barrel since Russia&#039;s invasion of Ukraine in February this year. High oil prices and a weaker rupee will only add to inflationary pressures in the economy.&amp;nbsp; &amp;nbsp;&amp;nbsp;&amp;nbsp; &lt;strong&gt;How Crude Oil Prices Affect Rupee?&amp;nbsp;&lt;/strong&gt;&lt;/p&gt;&lt;p&gt;India depends heavily on crude oil imports to meet over 80 per cent of its energy requirements. Whenever oil prices see an uptick, it tends to pressurise the rupee as India&rsquo;s import bills soar over higher crude prices.&amp;nbsp;&lt;/p&gt;&lt;p&gt;In May, the Brent crude touched $110 a barrel, which has now jumped to $122 per barrel. If oil prices are rising, it means imports are rising continuously. This pushes up the demand for the US dollar which strengthens the dollar against the rupee. The Indian rupee has been on the decline since January this year, this erodes the purchasing power of the Indian currency in the international market.&amp;nbsp; &amp;nbsp;&amp;nbsp; &lt;strong&gt;Is the Rupee likely to see more decline?&amp;nbsp;&lt;/strong&gt;&lt;/p&gt;&lt;p&gt;Several analysts believe the Rupee could decline further against the dollar in the next few sessions as oil prices go up and the FII sell-off continues.&amp;nbsp;&lt;/p&gt;&lt;p&gt;&amp;nbsp;&lt;/p&gt;&lt;p&gt;As per analysts, the fundamentals of the Indian economy have deteriorated.&amp;nbsp;&lt;/p&gt;&lt;p&gt;But this is where RBI&rsquo;s role comes into play and the central bank has been taking actions to stall the free fall. In May, it used India&rsquo;s huge stockpile forex reserves to prevent the rupee from hitting the Rs 77.5 level against the US dollar. &amp;nbsp;&amp;nbsp;&lt;strong&gt;Will the RBI intervene further?&amp;nbsp;&lt;/strong&gt;&lt;/p&gt;&lt;p&gt;The Reserve Bank of India (RBI) is fighting on several fronts to slow the rupee&rsquo;s decline to fresh records.&amp;nbsp;&lt;/p&gt;&lt;p&gt;&amp;nbsp;&lt;/p&gt;&lt;p&gt;The central bank is said to have sold dollars at 78.97-78.98 per US dollar on Wednesday and has heavily expanded its foreign exchange reserves to shield the rupee from a runaway depreciation. Since February 25, the headline foreign exchange reserves have declined by $40.94 billion.&amp;nbsp;&lt;/p&gt;&lt;p&gt;There are chances that the central bank may intervene further as the rupee sees a further decline.&amp;nbsp;&lt;/p&gt;', 1, '2022-07-14 08:38:57', 4, 17),
(26, 30, 'Dev', 11, 'Every day has new challenges & also something new to offer', '1657876393_fly-arch-wallpapers.jpg', '&lt;p&gt;all the great man that today we think &amp;nbsp;of had accepted the truth ..&lt;/p&gt;', 0, '2022-07-15 14:42:58', 0, 0),
(29, 59, 'Thor ', 11, 'You Are Just one step away! Don\'t Think, Just Start', '1658287465_compass-unsplash.jpg', '&lt;p&gt;As it is said Better start anyhow that thinking &amp;amp; wasting time on planning for a perfect start. Each Journey has something new to offer. And if we don&#039;t start how will we come to know what it has to offer to us.&lt;/p&gt;', 1, '2022-07-18 03:13:27', 5, 19),
(32, 60, 'Dev', 12, 'Explained: Social Media, Its Influence & Dangers', '1658260671_social-media.jpg', '&lt;p&gt;Most people use social media in one form or another. While there is nothing inherently wrong with that, and while social media can sometimes be beneficial, it&rsquo;s important to be aware that social media is associated with a number of issues and potential dangers, including stress, anxiety, loneliness, and depression.&lt;/p&gt;&lt;p&gt;Understanding the dangers of social media is important, both so you can deal with them yourself, and so you can help others deal with them. As such, in the following article you will learn about the issues that are associated with social media, see who is most vulnerable them, and find out what you can do to deal with them effectively.&lt;/p&gt;&lt;p&gt;&amp;nbsp;&lt;/p&gt;&lt;h3&gt;&lt;strong&gt;What are the dangers of social media:&lt;/strong&gt;&lt;/h3&gt;&lt;p&gt;The use of social media is associated with various issues, when it comes to people&rsquo;s emotional wellbeing, mental and physical health, and many other areas of life. Specifically, research shows that the use of social media is associated with:&lt;/p&gt;&lt;ul&gt;&lt;li&gt;&lt;a href=&quot;https://doi.org/10.1016/j.jad.2016.08.040&quot;&gt;Anxiety&lt;/a&gt;.&lt;/li&gt;&lt;li&gt;&lt;a href=&quot;https://doi.org/10.1089/cyber.2012.0156&quot;&gt;Stress&lt;/a&gt;.&lt;/li&gt;&lt;li&gt;&lt;a href=&quot;https://doi.org/10.1002/smi.2637&quot;&gt;Emotional exhaustion&lt;/a&gt;.&lt;/li&gt;&lt;li&gt;&lt;a href=&quot;https://doi.org/10.1002/da.22466&quot;&gt;Depression&lt;/a&gt;.&lt;/li&gt;&lt;li&gt;&lt;a href=&quot;https://doi.org/10.1016/j.chb.2014.04.011&quot;&gt;Loneliness&lt;/a&gt;.&lt;/li&gt;&lt;li&gt;&lt;a href=&quot;https://doi.org/10.1016/j.chb.2014.10.053&quot;&gt;Envy&lt;/a&gt;.&lt;/li&gt;&lt;li&gt;&lt;a href=&quot;https://doi.org/10.1016/j.adolescence.2016.05.008&quot;&gt;Low self-esteem&lt;/a&gt;.&lt;/li&gt;&lt;li&gt;&lt;a href=&quot;https://doi.org/10.1016/j.chb.2015.09.004&quot;&gt;Low-quality sleep&lt;/a&gt;.&lt;/li&gt;&lt;li&gt;&lt;a href=&quot;https://doi.org/10.1089/cyber.2012.0156&quot;&gt;Health problems&lt;/a&gt;.&lt;/li&gt;&lt;li&gt;&lt;a href=&quot;https://doi.org/10.1111/jabr.12158&quot;&gt;Addiction&lt;/a&gt; to the &lt;a href=&quot;https://doi.org/10.1016/j.jpsychires.2017.11.014&quot;&gt;social media&lt;/a&gt;.&lt;/li&gt;&lt;li&gt;Interference with &lt;a href=&quot;https://doi.org/10.1089/cyber.2010.0492&quot;&gt;important obligations&lt;/a&gt;, such as schoolwork, which can lead to issues such as &lt;a href=&quot;https://doi.org/10.1016/j.chb.2010.03.024&quot;&gt;worse grades&lt;/a&gt;.&lt;/li&gt;&lt;li&gt;General issues, such as &lt;a href=&quot;https://doi.org/10.1073/pnas.1517441113&quot;&gt;exposure to misinformation&lt;/a&gt;, &lt;a href=&quot;https://doi.org/10.1111/j.1744-1714.2011.01127.x&quot;&gt;violation of one&rsquo;s privacy&lt;/a&gt;, and &lt;a href=&quot;https://doi.org/10.1016/j.tele.2017.11.005&quot;&gt;political polarization&lt;/a&gt;.&lt;/li&gt;&lt;li&gt;Issues that play a role in &lt;a href=&quot;https://doi.org/10.1016/S2352-4642(19)30186-5&quot;&gt;specific situations&lt;/a&gt;, such as &lt;a href=&quot;https://doi.org/10.1080/15388220.2014.949377&quot;&gt;cyberbullying&lt;/a&gt; and &lt;a href=&quot;https://doi.org/10.1177/1077801216646277&quot;&gt;stalking&lt;/a&gt;.&lt;/li&gt;&lt;/ul&gt;', 1, '2022-07-20 01:27:51', 3, 7),
(33, 59, 'Thor ', 20, 'Covid\'19 Pandemic - A Disaster or an Opportunity?!', '1658261356_corona-virus.jpg', '&lt;p&gt;COVID-19 pandemic has shaken the world by affecting the economies since its outbreak in the Wuhan Institute of Virology, Wuhan, a city in China. The countries have taken precautionary measures like imposing lockdowns, sending COVID patients to a mandatory quarantine of fourteen days, making vaccines, restricting passengers from traveling abroad, etc. As far as India is concerned, it is needless to emphasize that this pandemic is probably the biggest problem the nation has faced after independence.&lt;/p&gt;&lt;p&gt;&amp;nbsp;&lt;/p&gt;&lt;p&gt;The decision to impose lockdown was necessary as India had no PPE Kits, vaccines, medicines, etc., to fight against this virus. Vaccination is the only permanent solution for this disease that has affected the whole world. Vaccines developed by various nations like India, the USA, UK, Russia, etc., can be a breakthrough to solve this crisis. All the vaccine-producing nations should come forward and distribute their vaccines to those that have suffered the most. They can argue that it is essential for them to vaccinate their citizens first, but in my opinion, a proper balance between the domestic use of vaccines and their export to needy nations should be maintained. The systematic approach in handling this pandemic can lead to prolific results. Proper utilization of vaccines without wastage will break the chain thereby reducing the number of cases globally. Lockdown has proven to be beneficial, but also created some problems for the people as many of them had complained of anxiety, depression, and mood swings, change in behaviour, etc.&lt;/p&gt;', 1, '2022-07-20 01:39:16', 1, 1),
(34, 61, 'Jack', 12, 'All you need to know about the era of WEB 3.0 ', '1658263022_code-pic.jpg', '&lt;p&gt;There&#039;s a lot more to Web 3.0 that is worth knowing in the growing digital era. We break down and explain all the essent&amp;nbsp;&lt;/p&gt;&lt;p&gt;&amp;nbsp;&lt;/p&gt;&lt;h3&gt;Key Features of Web 3.0:&lt;/h3&gt;&lt;p&gt;The following are key features and properties of Web 3.0:&lt;/p&gt;&lt;p&gt;Decentralization: The Web 2.0 version of the internet stores data in centralized locations. However, Web 3.0 will replace centralized social networks with decentralized apps (dApps). It will allow individuals to maintain ownership over their data.&lt;/p&gt;&lt;p&gt;Trustless and Permissionless: Web 3.0 will be trustless. It means that participants will be able to interact directly without going the requirement of a trusted intermediary.&amp;nbsp; Web3 will also be permissionless. It means that anyone can participate without authorization from a governing body.&lt;/p&gt;&lt;p&gt;Ubiquity: It will have the capacity to be everywhere simultaneously. Web3 will not only be limited to smartphones and computers. It will be available everywhere because most things around you us connected online (using the &lt;a href=&quot;https://www.naukri.com/learning/what-is-internet-of-things-st563&quot;&gt;Internet of Things&lt;/a&gt;).&lt;/p&gt;&lt;p&gt;Semantic Web: It is an essential part of Web 3.0. Coined by Tim Berners-Lee, semantic web focuses on improving web technologies to generate, share and connect content through analysis based on the ability to understand the meaning of words.&lt;/p&gt;&lt;p&gt;3D Graphics: Web3 will blur the line between the digital and physical world with the use of graphics technology. Web 3.0 will extensively use three-dimensional graphics in websites and services, such as online games, e-commerce, and the real estate market.&lt;/p&gt;', 1, '2022-07-20 02:07:02', 1, 4),
(35, 62, 'Dr. Strange', 21, 'Benefits of Yoga and Meditation.', '1658287073_yoga.jpg', '&lt;p&gt;Yoga offers physical and mental health benefits for people of all ages. And, if you&rsquo;re going through an illness, recovering from surgery or living with a chronic condition, yoga can become an integral part of your treatment and potentially hasten healing.&amp;nbsp;&lt;/p&gt;&lt;p&gt;A yoga therapist can work with patients and put together individualized plans that work together with their medical and surgical therapies. That way, yoga can support the healing process and help the person experience symptoms with more centeredness and less distress.&lt;/p&gt;&lt;p&gt;1. Yoga improves strength, balance and flexibility.&lt;/p&gt;&lt;p&gt;Slow movements and deep breathing increase blood flow and warm up muscles, while holding a pose can build strength.&lt;/p&gt;&lt;p&gt;&amp;nbsp;&lt;/p&gt;&lt;p&gt;2. Yoga helps with back pain relief.&lt;/p&gt;&lt;p&gt;Yoga is as good as basic stretching for easing pain and improving mobility in people with lower back pain. The American College of Physicians recommends yoga as a first-line treatment for chronic low back pain.&lt;/p&gt;&lt;p&gt;&amp;nbsp;&lt;/p&gt;&lt;p&gt;3. Yoga can ease arthritis symptoms.&lt;/p&gt;&lt;p&gt;Gentle yoga has been shown to ease some of the discomfort of tender, swollen joints for people with arthritis, according to&amp;nbsp;&lt;a href=&quot;https://www.ncbi.nlm.nih.gov/pubmed/24517304&quot;&gt;a Johns Hopkins review of 11 recent studies&lt;/a&gt;.&lt;/p&gt;&lt;p&gt;&amp;nbsp;&lt;/p&gt;&lt;p&gt;4. Yoga benefits heart health.&lt;/p&gt;&lt;p&gt;Regular yoga practice may reduce levels of stress and body-wide inflammation, contributing to&amp;nbsp;&lt;a href=&quot;https://www.hopkinsmedicine.org/health/wellness-and-prevention/the-yoga-heart-connection&quot;&gt;healthier hearts.&lt;/a&gt;&amp;nbsp;Several of the factors contributing to heart disease, including high blood pressure and excess weight, can also be addressed through yoga.&lt;br&gt;&amp;nbsp;&lt;/p&gt;', 1, '2022-07-20 08:47:53', 0, 8),
(36, 62, 'Dr. Strange', 11, 'Most effective ways to develop a never give up attitude.', '1658287351_man-in-gym.jpg', '&lt;p&gt;Lucky are those who do not lose face even in the course of repeated setbacks in life. For it is only a working of life&rsquo;s mannerisms that need us to fail before we can succeed. But if we are daunted so much by the humiliation of failures that we stop seeking success at all, then there&rsquo;s really no way we will ever realise life in all of its meaning. Scripting our own &lt;a href=&quot;https://www.innfinity.in/limitless/fauja-singh-oldest-marathoner/&quot;&gt;success story&lt;/a&gt; needs us to be privy to an attitude that however does not come easily to all. A never give up attitude can help you to achieve all that you wanted your life to be blessed with. And developing this attitude while is crucial can also be somewhat tricky. Below we explore the many effective ways that can help you develop this attitude so that your life is rendered all the more better by it-&lt;/p&gt;&lt;p&gt;&amp;nbsp;&lt;/p&gt;&lt;h3&gt;Build up a commitment&lt;/h3&gt;&lt;p&gt;It&rsquo;s easier said than done- this building up a commitment thing. Not because to commit itself is hard, but to believe that you can stay resolutely steadfast in your pursuit towards a singular aim is what makes it difficult. Commitment requires a lot of other equally strict adherences to remain true to its purpose. But building up a &lt;a href=&quot;https://www.innfinity.in/limitless/fear-of-commitment/&quot;&gt;commitment&lt;/a&gt;, or rather, overcoming the fear of it, is the first step towards developing a never give up attitude. Because it goes without saying that commitment thrives on the premise of being determined enough to not even let the thought of giving up cross your mind. In even its nascent being therefore, a resolute commitment to your goal is something you absolutely need for nurturing the attitude of never quitting on them.&lt;/p&gt;&lt;p&gt;&amp;nbsp;&lt;/p&gt;&lt;h3&gt;Belief in your commitment &amp;amp; Seek encouragement&lt;/h3&gt;&lt;p&gt;No matter how hard you might try to persist with the never give up attitude, life will still give you tough days. And it is in moments like these that you would be most vulnerable of losing your belief and hence your commitment. It therefore is extremely important to surround yourself with such folks who are a constant source of motivation. On days when you find it difficult to hold your own, it is a few words of encouragement that can do the trick.&lt;/p&gt;', 1, '2022-07-20 08:52:31', 1, 11),
(37, 34, 'Author', 23, 'The essence of love for those you love.', '1658456718_romance.jpg', '&lt;p&gt;On the earth, perhaps love is the most vital abstract element for humans. People are in search for love of parents, partner, work, place, etc. The bond of love is a source of power, motivation &amp;amp; joy. If one have no money but is blessed with the love of the people, with that strength of love he can progress where he desires.&amp;nbsp;&lt;/p&gt;&lt;p&gt;&amp;nbsp;&lt;/p&gt;&lt;blockquote&gt;&lt;p&gt;Love is what makes human a human.&lt;/p&gt;&lt;/blockquote&gt;&lt;p&gt;&amp;nbsp;&lt;/p&gt;&lt;p&gt;One such purest form of the bond of love is between mother and a child. A new-born child has no materialistic thing like money, assets or property or say if he had inherited them, he still have zero realization of his haves and have-nots. But he still he has the love of the mother which is above all that materialism. Love is what stops a baby crying when he finds his mother.&amp;nbsp;&lt;/p&gt;', 1, '2022-07-22 07:55:18', 1, 1),
(38, 34, 'Author', 22, 'How Traveling Can Change Your Mindset', '1658457178_travel-unsplash.jpg', '&lt;p&gt;Traveling has the power to transform your life and shift the way you think about yourself and the world. Here are just some of the ways adventuring the world can alter your mindset.&lt;/p&gt;&lt;p&gt;Did you know more than half of Americans don&#039;t use all their vacation time? It&#039;s a tragedy.&amp;nbsp;&lt;/p&gt;&lt;p&gt;Americans, you&#039;ve earned those days and you need to take them.&lt;/p&gt;&lt;p&gt;And here is why you should use them to travel.&lt;/p&gt;&lt;p&gt;&amp;nbsp;&lt;/p&gt;&lt;h3&gt;&lt;strong&gt;It is life changing&lt;/strong&gt;&lt;/h3&gt;&lt;p&gt;Traveling has the power to change your life in many ways.&amp;nbsp;&lt;/p&gt;&lt;p&gt;First, when you use those vacation days for travel, you are opening yourself up to new experiences and extending your comfort zone.&lt;/p&gt;&lt;p&gt;&amp;nbsp;&lt;/p&gt;&lt;h3&gt;&lt;strong&gt;It improves your mood&lt;/strong&gt;&lt;/h3&gt;&lt;p&gt;As soon as you step off the plane you&#039;re instantly excited, happy, carefree and lighthearted.&amp;nbsp;&lt;/p&gt;&lt;p&gt;You have left all your worries behind and become present in the moment as you navigate the novelty of your new environment.&lt;/p&gt;', 1, '2022-07-22 08:02:58', 1, 2),
(39, 34, 'Author', 18, 'What did the Coal Crisis pointed ?!', '1658459298_env-pollution.jpg', '&lt;p&gt;Coal crisis of 2021 was a consequence of Covid&#039;19 pandemic. Due to pandemic in 2020 &amp;amp; subsequent lockdowns, the mining of coal stopped and later in September-21, the prices of coal shot-up by 300%.&lt;/p&gt;&lt;p&gt;&amp;nbsp;&lt;/p&gt;&lt;p&gt;Covid&#039;19 with Russia-Ukraine war also affected the Crude oil. Crude oil prices were $120/barrel. Both these events made the economies which were highly dependent on fossil-fuel suffer.&lt;/p&gt;&lt;p&gt;&amp;nbsp;&lt;/p&gt;&lt;p&gt;Here we see an urgent need to expand our green projects and reduce the dependency on fossil-fuels. Renewable energy infrastructure should be scaled up. Green Economics will survive for long run on this burning planet.&lt;/p&gt;', 1, '2022-07-22 08:38:18', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `reactions`
--

CREATE TABLE `reactions` (
  `id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `username` varchar(60) DEFAULT NULL,
  `react` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reactions`
--

INSERT INTO `reactions` (`id`, `post_id`, `user_id`, `username`, `react`) VALUES
(1, 35, 60, 'Dev', 'agree'),
(3, 36, 60, 'Dev', 'heart'),
(4, 34, 60, 'Dev', 'agree'),
(5, 25, 60, 'Dev', 'heart'),
(6, 29, 60, 'Dev', 'bulb'),
(7, 29, 34, 'Author', 'bulb'),
(8, 32, 33, 'Admin', 'agree'),
(9, 25, 33, 'Admin', 'bulb'),
(10, 25, 34, 'Author', 'bulb'),
(11, 32, 34, 'Author', 'bulb'),
(12, 33, 34, 'Author', 'heart'),
(13, 39, 34, 'Author', 'clap'),
(14, 37, 34, 'Author', 'heart'),
(15, 24, 33, 'Admin', 'wow');

-- --------------------------------------------------------

--
-- Table structure for table `topics`
--

CREATE TABLE `topics` (
  `id` int(11) NOT NULL,
  `name` varchar(60) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `topics`
--

INSERT INTO `topics` (`id`, `name`, `description`) VALUES
(10, 'Biography', 'About a person\'s life'),
(11, 'Life-Lesson', 'Learnings & Experiences of Life'),
(12, 'Science-Technology', 'Tech, scientific'),
(17, 'Finance - Economy ', 'Money & Economy'),
(18, 'Nature', 'Nature, Energy, fuel, Environment\r\n\r\n\r\n'),
(19, 'How-To-Tutorials', 'Learn about BlogBuddy'),
(20, 'Covid\'19', 'Corona Virus'),
(21, 'Health-Lifestyle', 'Health Yoga and Lifestyle'),
(22, 'Travelling', 'Travel, Solo-Travel, tour, journey, exploring, adventure.\r\n\r\n'),
(23, 'Love - Romance', 'Love, Romance & Relationship\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `admin` smallint(6) NOT NULL,
  `username` varchar(60) NOT NULL,
  `email` varchar(80) NOT NULL,
  `password` varchar(80) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `admin`, `username`, `email`, `password`, `created_at`) VALUES
(33, 1, 'Admin', 'admin@bb.in', '$2y$10$I57m0peqS950q04RcJAeEOTZvGXj4SfNeAateOaSLjmNijNa40uJS', '2022-07-11 18:27:26'),
(34, 0, 'Author', 'author@bb.in', '$2y$10$nzaEjiVuhdN4WUaK/Xr2zeEHMDaiMP4BIpe5iM/IOS7LzGXPaLd56', '2022-07-11 18:28:10'),
(59, 0, 'Thor ', 'thor@avengers.com', '$2y$10$FfkCUBUanHV51NKTwOcQ8ec7ITbnV1kypKRo9lRpKfNFjatJNQpzi', '2022-07-17 21:38:32'),
(60, 0, 'Dev', 'dev@bb.in', '$2y$10$qO58sdKohznV.S1jloEa9Oq9bsAZJXcjXXNAXJ.Up.Rc0Gm7ih5B.', '2022-07-19 14:15:31'),
(61, 0, 'Jack', 'jack@bb.in', '$2y$10$iux.fEiqeSPe/vB5QC/gNeCuI2fMkNxrgk7Hoc8IywzYTil/KXWz6', '2022-07-19 20:32:04'),
(62, 0, 'Dr. Strange', 'drstrange@mcu.in', '$2y$10$gN0aNYMuG0YiRNyMQapWh.NgLMWRfz6FmhpoOz9r5G.zMGjhNd0lO', '2022-07-20 03:11:06');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `topic_id` (`topic_id`);

--
-- Indexes for table `reactions`
--
ALTER TABLE `reactions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `topics`
--
ALTER TABLE `topics`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=646;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `reactions`
--
ALTER TABLE `reactions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `topics`
--
ALTER TABLE `topics`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`topic_id`) REFERENCES `topics` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
