-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 13, 2017 at 02:29 PM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `samuel`
--

-- --------------------------------------------------------

--
-- Table structure for table `answers`
--

DROP TABLE IF EXISTS `answers`;
CREATE TABLE `answers` (
  `id` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `forumId` int(11) NOT NULL,
  `answer` text NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `answers`
--

INSERT INTO `answers` (`id`, `userId`, `forumId`, `answer`, `createdAt`, `updatedAt`) VALUES
(1, 1, 1, 'Hello', '2017-10-05 15:00:29', '2017-10-05 15:00:29'),
(2, 1, 1, 'Hi', '2017-10-05 15:08:31', '2017-10-05 15:08:31'),
(3, 1, 1, 'Musta ka pows?', '2017-10-05 15:08:39', '2017-10-05 15:08:39'),
(4, 1, 3, 'The food is great but the service is not good.', '2017-10-07 13:51:53', '2017-10-07 13:51:53'),
(5, 1, 3, 'Yes, the food here is really great, and I also agree that the service is not that good. We\'re really hungry that time and I remember that it took half an hour for our orders to be served.', '2017-10-07 13:55:34', '2017-10-07 13:55:34'),
(6, 1, 4, 'Bad movie', '2017-10-18 04:05:46', '2017-10-18 04:05:46'),
(7, 1, 4, 'This movie is not good.', '2017-10-18 04:06:07', '2017-10-18 04:06:07'),
(8, 1, 4, 'This movie is great.', '2017-10-18 04:06:31', '2017-10-18 04:06:31'),
(48, 1, 6, 'Hands down, of all the smartphones I have used so far, iPhone 8 Plus got the best battery life. I am not a heavy user. All I do is make few quick calls, check emails, quick update of social media and maps and navigation once in a while. On average with light use (excluding maps and navigation), iPhone 8 Plus lasts for 4 full days! You heard it right, 4 full days! At the end of the 4th day, I am usually left with 5-10% of battery and that\'s about the time I charge the phone. The heaviest I used it was once when I had to rely on GPS for a full day. I started with 100% on the day I was travelling and by the end of the day, I had around 70% left. And I was able get through the next two days without any issues (light use only).', '2017-12-13 13:43:35', '2017-12-13 13:43:35'),
(47, 1, 5, 'Sony has the fingerprint reader on the power button. Moving it under the display seems like a solution to a problem they don’t have', '2017-12-13 13:41:31', '2017-12-13 13:41:31'),
(46, 1, 5, 'You’re not missing much, imho. I found it kinda generic and a Nokia in name only, nothing like the Nokias of old.\r\n\r\nStill, it’s not a bad phone for the price. It seemed well-made and felt more expensive than it is. I just found it very uncomfortable to hold and unergonomic.\r\n\r\nAnd it’s worth mentioning that it only has a micro-USB port; no USB-C. Oh well, at least you wouldn’t have to worry about any USB-C incompatibility issues with it. And it even has a headphone jack.', '2017-12-13 13:41:17', '2017-12-13 13:41:17'),
(42, 1, 5, 'Sony is just really bad when it comes to usability/ergonomics. Sony phones look gorgeous in a museum but they aren’t meant to be used, they hate human hands.', '2017-12-13 13:38:24', '2017-12-13 13:38:24'),
(43, 1, 5, 'What really bugs me about that is that Sony used to be pretty good with ergonomics back in the Walkman days, especially some of their later devices in the late ‘80s and thru the ‘90s. That was around the time they started making them more contoured and hand-friendly.\r\n\r\nOf course that was decades ago, but since then it’s like they totally forgot how to design any of their devices with any sort of ergonomics in mind, except their headphones, which tend to be pretty comfortable.', '2017-12-13 13:38:38', '2017-12-13 13:38:38'),
(44, 1, 5, 'On the contrary, that they’re the basically the only OEM that makes a phone under 5" tells me they understand ergonomics far better than anyone else.', '2017-12-13 13:40:25', '2017-12-13 13:40:25'),
(45, 1, 5, 'I like the leaks. It might be a comeback for Sony in 2018. I guess we see more in MWC 2018.', '2017-12-13 13:40:41', '2017-12-13 13:40:41'),
(41, 1, 5, 'This dual camera setup looks like proper stereoscopic (3D) imaging, instead of simple wide/tele split. Pretty neat especially when paired with VR stuff', '2017-12-13 13:38:03', '2017-12-13 13:38:03'),
(40, 1, 5, 'For sure, I actually still prefer 16×9 so that wouldn’t bug me but they’d definitely be stepping out with the wrong foot for most people.\r\n\r\nI’m really curious why they’d opt to place the 2 camera sensors that far apart though. Has anyone tried that before?', '2017-12-13 13:37:07', '2017-12-13 13:37:07'),
(38, 1, 5, 'It’s…interesting, I guess. The matte gold phone doesn’t look much like a Sony device (must be the rounded corners) but the square-er one does look quite good. It’s fixed the main Sony issue of bezels that’re too big, and if it really does have a fingerprint reader under the screen, that’d be pretty sweet. \r\nBut I don’t see a headphone jack on either, and if Sony doesn’t up their camera game significantly, then this’ll go in the graveyard with all the rest of the beautifully outdated Sony phones of late. Plus, I took the front-on image into an editor, and as best as I can tell, the screen on the square-er model is still 16:9, so the phone will either be really wide or kinda small, both of which make it very 2015-esque.\r\nDoge’ll be happy, though :blush:', '2017-12-13 13:36:10', '2017-12-13 13:36:10'),
(39, 1, 5, 'Sorry, I didn’t post the top of the phones which is where the 3.5mm is. Click through to PA and you can see several more pics.', '2017-12-13 13:36:29', '2017-12-13 13:36:29'),
(36, 1, 5, 'I know what you mean, haven’t seriously considered a Sony phone in over 3 years.', '2017-12-13 12:46:37', '2017-12-13 12:46:37'),
(35, 1, 5, 'Interesting, but I’ve been disappointed by Sony Mobile too many times to really be able to take them seriously anymore.', '2017-12-13 12:46:14', '2017-12-13 12:46:14'),
(49, 1, 6, 'The last iPhone I used was an iPhone 5 and it is very clear that the smartphone cameras have come a long way. iPhone 8 Plus produces very crisp photos without any over saturation, which is what I really appreciate. Even though I got used to Samsung\'s over saturated photos over the last 3 years, whenever I see a photo true to real life colours, it really appeals me. When buying this phone, my main concern with camera was its performance in low light as I was used to pretty awesome performance on my Note 4. iPhone 8 Plus did not disappoint me. I was able to capture some shots at a work function and they looked truly amazing. Auto HDR seems very on point in my opinion. You will see these in the link below. Portrait mode has been somewhat consistent. I felt that it does not perform as well on a very bright day. But overall, given that it is still in beta, it works quite well (See Camaro SS photo). Video recording wise, it is pretty good at the standard 1080p 30fps. I am yet to try any 4k 60fps shots. But based on what I have seen from tech reviewers, it is pretty awesome.', '2017-12-13 13:43:53', '2017-12-13 13:43:53'),
(50, 1, 6, 'For a LCD panel, iPhone 8 Plus display is great. Colours are accurate and it gets bright enough for outdoor use. Being a 1080p panel, I think it really contributes to the awesome battery life that I have been experiencing.\r\n\r\nTalking about Touch ID, I think it still is the most convenient way to unlock your phone and make any payments. For me personally, it works 99% of the time and in my experience, it still is the benchmark of fingerprint unlocking of any given smartphone.', '2017-12-13 13:44:09', '2017-12-13 13:44:09'),
(51, 1, 6, 'I have missed iOS a lot over the last 3 years and it feels good to be back. Super smooth and no hiccups. I know few people have experienced some bugs recently. I guess I was one of the lucky ones not to have any issues. Maybe it was already patched when I bought the phone. However, my only complaint is the fact that iOS still does not let you clear all notifications from a particular app at once. I really would like to see fixed in a future update. Customisation wise, I do not have any issues because I hardly customised my Note 4. Only widgets I had running were weather and calendar. Even then, I would still open up the actual app to seek more detail. However, I still do not use iCloud. I really wish Apple would have given us more online storage for backup. 5GB is hardly enough these days to backup everything on your phone. One of my mates suggested that Apple should ship the phone with iCloud storage same as the phone. It surely would be awesome. But business wise, I cannot see Apple going ahead with such a decision. But in my opinion, iCloud users should get at least 15GB free. Coming from an Android, I thought it would make sense to keep using my Google account to sync contacts and photos as it would take away the hassle of setting everything up from scratch. Only issue is sometimes I feel like iOS restricting the background app refresh of Google apps such as Google photos. For example, I always have to keep Google Photos running in order to allow "background upload", which makes no sense. Same goes for OneDrive. Overall, navigation around the OS is easy and convenient.', '2017-12-13 13:44:18', '2017-12-13 13:44:18'),
(52, 1, 6, 'I really think Apple Maps still needs lot of catching up. Over the last few weeks, I managed to use it couple of times. Navigation wise, it seem to be good. But when it comes to looking up a place just by name seems like a real pain in the ass. Literally nothing shows up! Maybe it is a different story in other countries. But for now, Google Maps is the number 1 on my list.', '2017-12-13 13:44:26', '2017-12-13 13:44:26'),
(53, 1, 6, 'People seem to be complaining about Apple\'s decision to stick with the same design for 4 generations of phones. To be honest I quite adore this design. It seems like a really timeless and well-aged design. The new glass back adds a little modern and polished look to the phone and it really helps grip the phone if you are not using a case.\r\n\r\nOverall, iPhone 8 Plus is a great smartphone for every day use, especially with that killer battery life. I do not really regret not getting an iPhone X, because in my opinion, first iteration will always be problematic. 8 Plus is the final iteration of that particular design and have constantly improved. I am sure for my usage, the specs are more than enough to get me through the next 2-3 years.', '2017-12-13 13:44:39', '2017-12-13 13:44:39'),
(54, 1, 7, 'Bohol Tour Budget 1 pax- 6-7K (*** pa plande fare) but that will depend on your accomodations and sa tour na makukuha mo. Kung palarin ka at makasama ka sa isang malaking group eh di maliit lang ang magiging share mo pero kung 2 lang kayo mag hahati sa rentals eh di malaki babayaran mo. Kung ikaw lang at mag rerely ka sa public transport makakatip ka. Kung agency mo kukunin yung tours naku po good luck sa bulsa mo ', '2017-12-13 14:15:44', '2017-12-13 14:15:44'),
(55, 1, 7, 'Yung accomodations ang mahal pag mag isa ka lang, mag dedepend din yun sa kung ano gusto mo. Pag beachfront ang gusto mo prepare at least 1500 per night (room w/ TV) kung ok lang sa iyo na nde beach front may makukuha ka na 850-1000 per night yun nga lang common bathroom.', '2017-12-13 14:15:57', '2017-12-13 14:15:57'),
(56, 1, 7, 'Big problem nga. pwede nyo gawin start na agad kayo mag countryside tour. mag take out na lang kayo sa macdo. 1:00 pm start tour nyo tapos mag loboc river cruise kayo ng gabi (kung available sya ng sunday evening)', '2017-12-13 14:17:48', '2017-12-13 14:17:48');

-- --------------------------------------------------------

--
-- Table structure for table `forums`
--

DROP TABLE IF EXISTS `forums`;
CREATE TABLE `forums` (
  `id` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `forums`
--

INSERT INTO `forums` (`id`, `userId`, `title`, `subject`, `description`, `createdAt`, `updatedAt`) VALUES
(1, 1, 'Sample Forum', 'Forum', 'This is a sample forum', '2017-10-03 11:07:22', '2017-11-27 05:26:50'),
(2, 1, 'Forum 2', 'Forum', 'Sample forum 2', '2017-10-05 16:08:08', '2017-11-27 05:26:53'),
(3, 1, 'Five Star Restaurant Review', 'Food', 'This forum is about the reviews of the five star restaurant.', '2017-10-07 13:51:13', '2017-11-27 05:26:58'),
(4, 1, 'Series Review: Vikings', 'Vikings', 'This is a series vikings review', '2017-11-27 05:40:59', '2017-11-27 05:40:59'),
(5, 1, '2018 Sony Leaks Look Promising', 'Sony', 'So leak season basically never ends right?\r\n\r\nInteresting rumors floating around already for Sony\'s plans next year. Allegedly the flagship may have an under screen fingerprint sensor! I think this design/feature set would definitely get them back in the conversation, assuming that normal people are aware of its existence and they can actually acquire them in the US. This would\'ve been on my short list had it landed in 2017. Is it enough to keep up with where we expect everyone else to be next year, particularly if Samsung rolls out a foldable screen? Thoughts?', '2017-12-13 12:43:54', '2017-12-13 12:43:54'),
(6, 1, 'iPhone 8 Plus - Quick review from an average user', 'iPhone', 'I have decided to switch camps yet again after using a Galaxy Note 4 for 3 years. Like most of the people who have not used an iPhone in a while, my initial thought was to go after the iPhone X. But after weighing out all the pros and cons that concerned me, I have decided to settle for an 8 Plus. It has been just over 3 weeks of daily use and here\'s what I think of it.', '2017-12-13 13:43:23', '2017-12-13 13:43:23');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `firstName` varchar(255) NOT NULL,
  `lastName` varchar(255) NOT NULL,
  `birthDate` date NOT NULL,
  `sex` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `contactNumber` varchar(255) NOT NULL,
  `emailAddress` varchar(255) NOT NULL,
  `username` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `password` varchar(255) NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deactivated` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstName`, `lastName`, `birthDate`, `sex`, `address`, `contactNumber`, `emailAddress`, `username`, `password`, `createdAt`, `updatedAt`, `deactivated`) VALUES
(1, 'Patrick Dale', 'Rugayan', '1997-12-22', 'Male', 'Caloocan City', '09472199299', 'pdale.rugayan@gmail.com', 'dalerugs', '9a4ec2750fa018fd3ba9d4c652849aff', '2017-10-02 13:33:01', '2017-10-02 13:33:01', 0),
(2, 'Juan', 'Dela Cruz', '1997-12-22', 'Male', 'Caloocan City', '1234567890', 'jdlc@gmail.com', 'juandlc', '867b230947e0cc1411756a1d40384cd1', '2017-12-08 14:52:21', '2017-12-08 14:52:21', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `answers`
--
ALTER TABLE `answers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `forums`
--
ALTER TABLE `forums`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `answers`
--
ALTER TABLE `answers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;
--
-- AUTO_INCREMENT for table `forums`
--
ALTER TABLE `forums`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
