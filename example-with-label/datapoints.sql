DROP TABLE `datapoints3`;
CREATE TABLE `datapoints3` (
  `label` varchar(11) NOT NULL,
  `xval` int(11) NOT NULL,
  `yval` int(11) NOT NULL
);
INSERT INTO `datapoints3` (`label`, `xval`, `yval`) VALUES
('tree', 10, 71),
('cat', 20, 71),
('dog', 30, 55),
('bird', 40, 14);
