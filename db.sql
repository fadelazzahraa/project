START TRANSACTION;
CREATE TABLE `user` (
  `id` int(3) NOT NULL PRIMARY KEY,
  `name` varchar(255) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `role` varchar(10) NOT NULL
);
INSERT INTO `user` (`id`, `name`, `username`, `password`, `role`) VALUES
(1, 'Fadel Azzahra', 'fadelazzahra', 'password', 'user'),
(2, 'Administrator', 'admin', 'password', 'admin');
CREATE TABLE `product` (
  `id` int(3) NOT NULL PRIMARY KEY,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `price` int(20) NOT NULL,
  `qty` int(5) NOT NULL,
  `imagepath` varchar(50) NOT NULL
);
INSERT INTO `product` (`id`, `name`, `description`, `price`, `qty`, `imagepath`) VALUES
(1, 'Nasi Rames', 'Nasi Rames merupakan makanan favorit semua orang. Berbagai macam lauk dan sayur ada di menu ini', 15000, 0, '1.jpg'),
(2, 'Nasi Goreng Telur', 'Nasi Goreng Telur merupakan salah satu makanan khas Indonesia yang sangat identik dengan Indonesia', 18000, 7, '2.jpg'),
(3, 'Nasi Padang', 'Nasi Padang merupakan makanan khas Padang yang sudah sangat terkenal di seluruh Indonesia', 20000, 9, '3.jpg'),
(4, 'Nasi Kebuli', 'Nasi Kebuli merupakan salah satu varian nasi selain nasi putih', 25000, 7, '4.jpg'),
(5, 'Nasi Merah', 'Nasi Merah merupakan salah satu varian nasi selain nasi putih yang terkenal sebagai nasi diet karena kandungannya', 30000, 7, '5.jpg'),
(6, 'Nasi Bakar', 'Nasi Bakar adalah salah satu nasi yang cara penyajiannya termasuk unik, yaitu dengan cara dibakar. Nasi ini memiliki aroma wangi yang membuat ketagihan', 20000, 10, '6.jpeg'),
(7, 'Nasi Kuning', 'Nasi Kuning adalah salah satu masakan nasi yang unik di Indonesia. Biasanya disajikan pada acara-acara penting, seperti syukuran', 50000, 5, '7.png'),
(8, 'Nasi Megono', 'Nasi Megono yang merupakan nasi dicampur sayur-sayuran ini merupakan makanan khas Pekalongan dan Wonosobo. Biasanya dihidangkan dengan tempe goreng', 10000, 9, '8.png'),
(9, 'Nasi Bebek', 'Nasi Bebek Madura merupakan makanan khas Madura yang telah melegenda. Makanan ini sangat ikonik dengan sambal hitamnya yang melegenda', 35000, 2, '9.jpeg');
