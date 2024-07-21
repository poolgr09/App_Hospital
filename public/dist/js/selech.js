function populate(s1,s2)
		{
			var s1 = document.getElementById(s1);
			var s2 = document.getElementById(s2);

			s2.innerHTML = "";

            switch (s1.value) {
                case "09:00":
                    var optionArray = ['09:30|09:30','10:00|10:00','10:30|10:30','11:00|11:00','11:30|11:30','12:00|12:00','16:00|16:00','16:30|16:30','17:00|17:00','17:30|17:30','18:00|18:00'];
                    break; 
                case "09:30":
                    var optionArray = ['10:00|10:00','10:30|10:30','11:00|11:00','11:30|11:30','12:00|12:00','16:00|16:00','16:30|16:30','17:00|17:00','17:30|17:30','18:00|18:00'];
                    break; 
                case "10:00":
                    var optionArray = ['10:30|10:30','11:00|11:00','11:30|11:30','12:00|12:00','16:00|16:00','16:30|16:30','17:00|17:00','17:30|17:30','18:00|18:00'];
                    break; 
                case "10:30":
                    var optionArray = ['11:00|11:00','11:30|11:30','12:00|12:00','16:00|16:00','16:30|16:30','17:00|17:00','17:30|17:30','18:00|18:00'];
                    break; 
                case "11:00":
                    var optionArray = ['11:30|11:30','12:00|12:00','16:00|16:00','16:30|16:30','17:00|17:00','17:30|17:30','18:00|18:00'];
                    break; 
                case "11:30":
                    var optionArray = ['12:00|12:00','16:00|16:00','16:30|16:30','17:00|17:00','17:30|17:30','18:00|18:00'];
                    break; 
                case "16:00":
                    var optionArray = ['16:30|16:30','17:00|17:00','17:30|17:30','18:00|18:00'];
                    break; 
                case "16:30":
                    var optionArray = ['17:00|17:00','17:30|17:30','18:00|18:00'];
                    break; 
                case "17:00":
                    var optionArray = ['17:30|17:30','18:00|18:00'];
                    break; 
                case "17:30":
                    var optionArray = ['18:00|18:00'];
                    break; 
                default:
                    break;
            }

			for(var option in optionArray)
			{
				var pair = optionArray[option].split("|");
				var newoption = document.createElement("option");

				newoption.value = pair[0];
				newoption.innerHTML=pair[1];
				s2.options.add(newoption);
			}

		}