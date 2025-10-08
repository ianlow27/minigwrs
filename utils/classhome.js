const encUsr = encryptString(initials1); 
//alert(encryptedValue);
function shiftCharacter(char) {  
  const charCode = char.charCodeAt(0);           
 if (charCode >= 97 && charCode <= 122) {   
 return String.fromCharCode((charCode - 97 + 2 + 26) % 26 + 97);
   }        
  return char;
}
function encryptString(str) {  
 return str.split("").map(shiftCharacter).join(""); 
}


document.getElementById('title1').innerHTML = name1 + "'s Welsh Exercises";
document.title = name1 + "'s Welsh Exercises";

document.getElementById('diarylnk1').innerHTML = name1 + "'s Google Doc Welsh Learning Diary";
document.getElementById('diarylnk1').href = diaryurl1;
//document.getElementById('diarylnk1').target = "blank";


const grid = document.getElementById('grid');

// Sample pastel color palette
const pastelColors = [
  '#FFEBEE', '#FFF8E1', '#E8F5E9', '#E3F2FD', '#F3E5F5',
  '#FBE9E7', '#E0F7FA', '#FFFDE7', '#EDE7F6', '#F9FBE7',
  '#F1F8E9', '#E1F5FE'
];

let idx = 0;
for (let r of modLinks) {
  //let orig_r = r;
  let bdone = r.match(/html_done/);
  let b2do = r.match(/html_2do/);
  let lemoji = "&emsp;";
  //let lemoji = "тнР";
  if (bdone){ lemoji = "⭐"; 
    r = r.replace(/html_done/,"html")
  }else if(b2do){ lemoji = "✏️"; 
    r = r.replace(/html_2do/,"html")
  }
  idx++;
  const url = new URL(r);
  const path = url.pathname;
  const baseName = path.substring(path.lastIndexOf('/') + 
     1).replace('.html', '').replace(/modiwl(0*)/,'');
  const moduleTitle = baseName;
  const moduleLink = r +  "?u=" + encUsr;
    const div = document.createElement('a');
    div.className = 'grid-item';
    div.innerHTML = idx + "<br/>" + moduleTitle  + "<br/>" + lemoji;
    div.href = moduleLink;
    //div.target = '_blank';
    div.style.backgroundColor = pastelColors[Math.floor(Math.random() * pastelColors.length)];

    grid.appendChild(div);
    //moduleNumber++;
}//endfor