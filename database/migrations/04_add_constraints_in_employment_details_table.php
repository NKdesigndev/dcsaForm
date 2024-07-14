ALTER TABLE `employment_details`
  ADD CONSTRAINT `employment_details_ibfk_1` FOREIGN KEY (`nominee_id`) REFERENCES `nominees` (`id`),
  ADD CONSTRAINT `fk_nominee_id` FOREIGN KEY (`nominee_id`) REFERENCES `nominees` (`id`);