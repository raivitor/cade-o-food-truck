<?php
	abstract class AbstractCrl {

		public class service($obj){
			switch ($obj['id']) {
				case 1:
					create($obj);
					break;
				
				case 2:
					read($obj);
					break;

				case 3:
					update($obj);
					break;

				case 4:
					delete($obj);
					break;
			}
		}

		public class create($obj);

		public class read($obj);

		public class update($obj);

		public class delete($obj);
	}
?>