const url = new URL(document.URL);
const pathname = url.pathname; // "/path/to/file.html"
const basename = pathname.substring(pathname.lastIndexOf("/") + 1).replace(/\.[^/.]+$/, ""); // "file";
//alert(basename)
//--------------------------------------------
//const encUsr = encryptString(initials1); 
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

document.getElementById('instruct1').innerHTML = "<br/>Complete these activities in ascending numerical order (bottom-right buttons to top-left) as often as you like in your free time: " 
+"✏️= to do "
+"&ensp;"
+"⭐ = completed"
;

const grid = document.getElementById('grid');

// Sample pastel color palette
const pastelColors = [
  '#FFEBEE', '#FFF8E1', '#E8F5E9', '#E3F2FD', '#F3E5F5',
  '#FBE9E7', '#E0F7FA', '#FFFDE7', '#EDE7F6', '#F9FBE7',
  '#F1F8E9', '#E1F5FE'
];

let idx = 0;
const modLinks1 = modLinks.reverse();
for (let r of modLinks1) {
  //let orig_r = r;
  //let bdone = r.match(/html_done/);
  //let b2do = r.match(/html_2do/);
  let lemoji = "&emsp;";
  //let lemoji = "тнР";
  if (r.match(/html_done/)){ lemoji = "⭐"; 
    r = r.replace(/html_done/,"html")
  }else if(r.match(/html_2do/)){ lemoji = "✏️"; 
    r = r.replace(/html_2do/,"html")
  }else if(r.match(/html_cheetah/)){ lemoji = "🐆"; 
    r = r.replace(/html_cheetah/,"html")
  }else if(r.match(/html_lion/)){ lemoji = "🦁"; 
    r = r.replace(/html_lion/,"html")
  }else if(r.match(/html_horse/)){ lemoji = "🐎"; 
    r = r.replace(/html_horse/,"html")
  }else if(r.match(/html_hare/)){ lemoji = "🐇"; 
    r = r.replace(/html_hare/,"html")
  }else if(r.match(/html_elk/)){ lemoji = "🫎"; 
    r = r.replace(/html_elk/,"html")
  }else if(r.match(/html_zebra/)){ lemoji = "🦓"; 
    r = r.replace(/html_zebra/,"html")
  }else if(r.match(/html_kangaroo/)){ lemoji = "🦘"; 
    r = r.replace(/html_kangaroo/,"html")
  }else if(r.match(/html_squirrel/)){ lemoji = "🐹️"; 
    r = r.replace(/html_squirrel/,"html")
  }
  idx++;
  //const url = new URL(r);
  const path = r; //url.pathname;
  const baseName = path.substring(path.lastIndexOf('/') + 
     1).replace('.html', '').replace(/modiwl(0*)/,'');
  const moduleTitle = baseName;
  const modNum = moduleTitle.split(/\-/)[0];
  let colNum = (modNum % pastelColors.length);
  if(isNaN(colNum)){
     colNum = 0;
  }
console.log("_____" + (modNum % pastelColors.length) + "___" + pastelColors.length);
  const moduleLink = r +  "?u=" + basename; //encUsr;
    const div = document.createElement('a');
    div.className = 'grid-item';
    let atmp1 = moduleTitle.split(/__/);
    div.innerHTML = 
          //  "<br/>"
         +  ((modLinks1.length + 1) - idx) + "<br/>" + moduleTitle  + "<br/>" 
         + (typeof  abtnsdesc[moduleTitle] != "undefined" 
              ?   "<span style='font-size:80%;font-weight:normal;'>"
                + abtnsdesc[moduleTitle]
                + "</span><br/>" 
              : "" )
         +  lemoji;
    div.href = moduleLink;
    //div.target = '_blank';
    //div.style.backgroundColor = pastelColors[Math.floor(Math.random() * pastelColors.length)];
    div.style.backgroundColor = pastelColors[colNum];

    grid.appendChild(div);
    //moduleNumber++;
}//endfor
