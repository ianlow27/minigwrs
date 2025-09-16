# BRASOLWG:
## ffeiliau cod tarddiad:
1. cwrs1a.php
1. amdrin1.php
1. amdrin2.php
1. amdrin0a.php
1. amdrin0b.php

## CYFLWYNIAD:
Mae'r blygell fan yma yn cynnwys y cod tarddiad i gynhyrchu y tudalennau HTML ar gyfer y shorts cwrs Iaith Cymraeg ar gyfer dechreuwyr.
YSGRIFENNU YSTORI YN CYNTAF, WEDYN RHEDEG AMDRIN1.PHP A'R AMDRIN2.PHP AC YN OLAF CWRS1A.PHP:  \
Mae'r y testun ar gyfer yr holl cwrs yn ei gynwys i gyd i mewn y ffeil testun. Mae'r amcan o'r ffeil yw ar gyfer yr awdur y cwrs i ysgrifennu y nofel ar gyfer y cwrs pennod gan pennod i mewn yn y ffeil fan yma. Wedyn, i redeg i mewn yn y golygydd vi y gorchymyn "r! amdrin1.php" i allbynnu i mewn yn y ffeil "testun" y allbynniad o'r amdriniaethiad o'r pennod diweddaraf, ac wedyn i redeg yn yr un fodd y gorchymyn "r! amdrin2.php" i allbynnu i mewn yn yr un ffeil y testun ar gyfer y amdriniaethwr (prosesydd neu gorymdeithiwr). \
Wedyn allan o'r ffeil testun, mae'n angen i redeg ar y llinellgymell y gorchymyn "cwrs1a.php" i genhedlu y gwersi i gyd yn y cwrs. Fe fydd y tudalennau HTML ar gyfer pob un gwers oddiwrth y dechreuad yn cael ei ailgreu.  \
Ar gyfer y cynhyrchiad o'r fideoedd, yr ydym ni'n dim ond yn eisiau y diweddaraf. \
Mae'r cwrs1a.php yn darllen yr holl ffeil testun, ond mae e'n ddim ond yn gorymdeithu y rheini sydd yn dechreu gyda'r arwyddnodiau '|' neu '\`'. Felly mae'r amdrin1.php yn gorymdeithu yr testun dechreuedig, sef yr un gyda'r ystori neu'r pennod o'r nofel ac yn perffurfio gwiriadau ereill i wneud y testun i fod yn y cyflwr addas ar gyfer y rhediad o'r amdrin2.php. Mae'r amdrin2.php yn traswglwyddo yr llinellau gyda y arwyddnod dechreuedig o'r '!' i '\`', a felly i fod yn addas i redeg 'cwrs1a.php' arno.\
YSGRIFENNU GEIRFA YN CYNTAF, WEDYN RHEDEG AMDRIN0A.PHP A'R AMDRIN0B.PHP, AC YN OLAF CWRS1A.PHP : \
Os ydym ni'n eisiau i ddechreu nid gyda'r ystori neu pennod, ond gyda'r 28 gair yn y geirfa, yr ydym ni'n gallu rhedeg amdrin0a.php (neu amdrin3.php) sydd dim ond yn darllen y llinellau dechreuedig gyda'r '%' i genhadlu y rhestr o eirfa dechreuedig gyda'r arwyddnod '&'. Wedyn, mae'n angen nawr ar gyfer y defnyddiwr i ysgrifennu yr ystori neu bennod gyda'r llinellau yn dechreu gyda'r '^'. Ac wedyn, os ydy'r defnyddio yn defnyddio y rhif yn y rhestr o eirfa, sef y rhifau 1 i 28 canlynoliedig gyda'r arwyddnod '\`', mae'r amdrin0b.php yn gallu trawsglwyddo y llinellau hyn i dechreu gyda'r '|' a'r '\`' fel y gallo cwrs1a.php yn ei drawsglwyddo i'r tudalennau HTML fel gwersi newydd. 

## CREU FIDEO:
Mae'r fideo yn cael ei creuwyd oddiwrth y ddwy elfen, sef y sgrinsaethiad sgwar o'r tudalen HTML sydd hefyd yn gweinio fel y bodewin ar gyfer y fideo, ac yn ail, y sain recordiwyd gyda'r meddalwedd SoundRecorder. Ar gyfer y cyfyngiad o'r hyd o'r fideo i fod yn llai na'r 1 munud, yr ydym ni'n defnyddio Audacity i lanhau yr ansawdd o'r sain, ac hefyd i torri allan tawelychau ac ati oddiwrth y recordiad.
Wedyn, mae'r y sain a'r delw yn cael eu cydymunwyd trwy'r feddalwedd pitivi i genhedlu y fideo.

## NODYNNAU MANWL:
1) Ynglyn a'r lleoliadau o'r delwau ar y dudalen HTML, mae'r hyn yn cael eu hambenodwyd oddiwrth y gosodiadau \`llun1 a \`llun2. E.e. yn y ffurfweddiad \`llun2=cenhinen-bedr/80/495/325, mae'r llun cenhinen-bedr.png yn cael ei osodwyd i fod yn 80px yn lled, 495px ar draws i'r dde o'r dudalen, ac wedyn 325px i lawr oddiwrth y brig o'r dudalen. Os yr ydym ni'n eisiau \`llun2 i arddangos dim byd o gwbl, yr ydym ni'n gallu ambenodi y llun i fod yn wag, fel hyn, \`llun2=gwacter/1/3/7
2) Y dyben neu wrthrycholyn o'r ffeil "testun" yw ar gyfer yr awdur y cwrs i ysgrifennu y nofel yn y cymysgiaith Saesnegaiddgymraeg fel un gwers o'r cwrs, ac wedyn yn y gwers nesaf i'r pennod oddiwrth y nofel, i arddangos yr eirfa ar gyfer y pennod olaf. Yn pob un pennod mae'n angen dim ond dau ddeg wyth o eiriau newydd oherwydd mae angenrhaid ar gyfer y pennill i fod yn caniadawy gyda'r alaw Bah-bah black sheep. I wybod pan mae'r y dau ddeg wyth gair wedi eu chyflawnwyd, yr ydym ni'n rhedeg r! amdrin1.php. Wedyn, ar ol y cenhedlad o'r allbynniad o'r amdrin1.php, yr ydym ni'n rhedeg amdrin2.php. Ac wedyn, ar ol hyn, yr ydym ni'n ymadael y golygydd vi, ac yn rhedeg y gorchymyn cwrs1a.php
3) AMDRIN1.PHP: Felly, yr ydym ni'n gallu ysgrifennu rhywbeth fel islaw, nodwch mae'r y symbol pibell ar y dechreuad o bob linell yn angenrhediol, i arwyddocau y mae'r hyn yn destun neu bennod ar gyfer y cwrs...
```
#beginnerwelsh #learnwelsh, Lesson 8, #welshreading #shorts, 221027
Beginner's Welsh Lesson 8, Welsh Reading Exercise
|ffeil=gwers008
|gwers=Beginner's Welsh Lesson 8
|teitl=Taith Hywel/Pennod 2
|Felly, y gwnaeth y fi decide` i contact` yr hysbyseb yn y newspaper` lleol.  
|Y Gwnaeth y fi phone` y telephone` number` at` y bottom` of` yr hysbyseb.
...Wedyn, ar ol rhedeg y gorchymyn "r! amdrin1.php", yr ydym ni'n derbyn yr allbynniad yn y testun:
***  ***
!1) at~prep/ca^r~prep/gar~prep/ger~prep/trach~adv/yn~prep = at
!2) gwaelod~nm/gwaelod~nm/gwaelodi~vbinf/ti^n~nm/tin~nf/tin~nf = bottom
!3) cyffyrddiad~nm/wrdd~nm/wrth~nm = contact
!4) penderfynu~vbinf = decide
!5) newyddiadur~nm = newspaper
!6) aelod~nm/eirif~nm/lliaws~nm/maint~nm/nifer~nm/nifer~nmf/niferu~vbinf/rhif~nm/rhif~nm/rhifnodi~vbinf/rhifo~vbinf = number
!7) mo~prep/o~adv/o~prep/oddiar~prep = of
**********
GWALL! nid ydy'r gair Cymraeg ar gyfer 'phone' yn bodoli yn geirfa.txt!
**********
```
4) AMDRIN2.PHP: Mae'r awdur yn parod i redeg amdrin2.php pan mae'r rhestr o eiriau newydd yn cyrrhaedd hyd at 28.
...Felly, mae'n angen i ni i ychwanegu y gair saesneg phone i mewn i'r ffeil geirfa.txt. Y mae'r y gweddill o'r geiriau yn terfynu gyda'r arwyddnod acen drom (grave) "\`" yn arwyddocau i'r amdriniaethwr, sef amdrin1.php y fod y gair hwn yn air newydd. Unrhyw air Cymraeg heb arddangoswyd  o'r blaen fe fydd e'n arddangos rhwng y tryphlyg seren. Yn amgen, mae'r pob gair Cymraeg defnyddio wedi'i ddysgwyd yn y gwersi o'r blaen.
_____________________________

# Usage Guide in English:
## Example Usage: 
__Step 1:__ Create a start project folder by entering "nw <course-short-name>" e.g. "nw course1". This will create a new folder called "cwrs_course1".
__Step 2a:__ "cd" to your new project folder, e.g. "cd "cwrs_course1", and edit the file that is the same name as your course short name e.g. course1. This already contains a template lesson 1.
__Step 2b:__ Write your text in English i.e. the source language that your student speaks, not the target language that your student wishes to learn i.e. Welsh. Below is an example: \
Good morning! \
How are you? \
What is your name? \
__Step 3:__ NOTE!! All lines are ignored except lines that start with backtick (\`) or pipe (|). Add the line "|=====" (pipe followed by 5x or more equal signs) before and after the text  to indicate the section start and end. \
__Step 4:__ Start each line to be analyzed with the pipe symbol (|). \
__Step 5:__ Suffix each word that you want your student to the learn the Welsh translation of with a backtick (`). Your text should now look like this: \
```
 |================= 
 |Good` morning`! 
 |How` are_you`? 
 |What` is` your` name`? 
 |================= 
```
__Step 6:__ In vi command mode go to the last line of the file (Shift+G) and run "r! a1". This will output a list of possible Welsh words for the English as shown below:
```
 !1) ydych~vbinf = are_you
 !2) cymwynasgar~adj/da~adj/daiawn~adj/daioni~nm/daionus~adj/lles~nm/mad~adj = good
 !3) cyn~adv/dychrymu~vbinf/mor~adv/mor~adv/pa_fodd~adv/pa_wedd~adv/sut~adv = how
 !4) mae~vbinf/sy~vbinf/sydd~vbinf/ydyw~vbinf/ys~vbinf/yw~vbinf = is
 !5) bore~nm/bore~nm/boregwaith~nm/boreol~adj/boreu~nm/boreuol~adj/dydd~nm = morning
 !6) enw~nm/enw~nm/enwi~vbinf/henw~nm = name
 !7) beth~pron/beth~pron/beth~pron/by~conj/nan~adv/pa~adj/peth~adj/py~adj = what
 !8) 'ch~pron/eich~adj/eich~pron/eich~pron/eich~pron/'th~pron = your
 *** *** (8 geiriau)
```
__Step 7:__ In VI Command mode press "u" to undone the previous command to remove the list of Welsh words. Then continue expanding the English text with backticks as you did in steps 1 to 5. Keep on repeating steps 6 to 7 until you have 28 words. If the word does not exist in the vocab i.e. geirfa23.txt, you will be prompted in Welsh to add it in. If there is any word that does not exist in the list of already used words i.e. geiriau.txt you will also be notified in Welsh. When you have 28 new Welsh words, then your English text should look something like this:
```
 |=================
 |Good` morning`!
 |How` are_you`?
 |What` is` your` name`?
 |How` are_you` today`?
 |Are_you` happy` or sad`?
 |My` name` is` Peter.
 |I` am` happy` today`.
 |Who` is` he`? He` is` my` father`.
 |What` is` his` name`? His` name` is` Jonathan.
 |Who` is` she`? She` is` my` mother`.
 |What` is` her` name`? Her` name` is` Margaret.
 |Who` is` he`? He` is` my` brother`.
 |What` is` his` name`? His` name` is` Mike.
 |Who` is` she`? She` is` my` sister`.
 |What` is` her` name`? Her` name` is` Marianne.
 |How` old` is` your` brother`?
 |See_you` later`!
 |Bye` then`!
 |=================
```
__Step 8:__ Go to the end of the file (Shift+G) and then run "r! a1". This should append the following lines at the bottom of the file:
```
 !1) ydwyf~vbinf = am
 !2) ydych~vbinf = are_you
 !3) brawd~nm/brawd~nm/brawd~nm = brother
 !4) hwyl~phrs = bye
 !5) pab~nm/tad~nm/tad~nm/tadogi~vbinf = father
 !6) cymwynasgar~adj/da~adj/daiawn~adj/daioni~nm/daionus~adj/lles~nm/mad~adj = good
 !7) arwyn~nm/dedwydd~adj/gwynfydedig~adj/hapus~adj/hapus~adj = happy
 !8) e~pron/e~pron/ef~pron/ef~pron/ef~pron/efe~pron/efo~pron/fe~pron/fe~pron/me~pron/mo~pron/o~pron = he
 !9) ei~pron/ei~pron/ei~pron/hi~pron/'w~possprn = her
 !10) e~pron/ei~pron/ei~pron/ei~pron/'w~possprn/ei_un_ef~adv = his
 !11) cyn~adv/dychrymu~vbinf/mor~adv/mor~adv/pa_fodd~adv/pa_wedd~adv/sut~adv = how
 !12) fi~pron/i~pron/mi~pron = i
 !13) mae~vbinf/sy~vbinf/sydd~vbinf/ydyw~vbinf/ys~vbinf/yw~vbinf = is
 !14) yn_hwyrach~adv/hwyrach~adj = later
 !15) bore~nm/bore~nm/boregwaith~nm/boreol~adj/boreu~nm/boreuol~adj/dydd~nm = morning
 !16) mam~nf/mam~nf/mam~nm = mother
 !17) fy~adj/fy~adj/fy~pron/fy~pron/fy~pron/'m~pron/mau~pron/my~pron/ym~pron/ym~pron = my
 !18) enw~nm/enw~nm/enwi~vbinf/henw~nm = name
 !19) he^n~adj/hen~adj/hen~adj = old
 !20) aele~adj/agro~adj/dienig~adj/dybryd~adj/dybyr~adj/galarus~adj/prudd~adj/trist~adj/trist~adj/trom~adj/trwm~adj = sad
 !21) gwelwch_chi~phrs/gwela_di~phrs = see_you
 !22) hi~pron/hi~pron/hi~pron = she
 !23) chwaer~nf/chwaer~nf/chwaer~nm/chwaer~nm/chwiorydd~nm = sister
 !24) acw~adv/chwedi~adv/minau~pron/te~adv/wedi~adv/wedin~adv/wedyn~adv/wedyn~adv/yna~adv/yna~adv/yna~conj = then
 !25) heddiw~adv = today
 !26) beth~pron/beth~pron/beth~pron/by~conj/nan~adv/pa~adj/peth~adj/py~adj = what
 !27) a~pron/pwy~pron/pwy~pron/pwy~pron = who
 !28) 'ch~pron/eich~adj/eich~pron/eich~pron/eich~pron/'th~pron = your
 *** _ JONATHAN_  _ MARGARET_  _ MARIANNE_  _ MIKE_  or_brim~nm/if~conj/limit~nm/margin~nm`  _ PETER_  *** (92 geiriau)
```
__Step 9:__ Now select the correct Welsh word for the English word in the text by suffixing the correct Welsh term with the backtick (\`). For example in the line "!6) cymwynasgar\~adj/da\~adj/daiawn\~adj/daioni\~nm/daionus\~adj/lles\~nm/mad\~adj = good" if the correct Welsh word is "da\~adj" then suffix this with "\`" e.g. "da\~adj\`" so that the line becomes "!6) cymwynasgar\~adj/da\~adj\`/daiawn\~adj/daioni\~nm/daionus\~adj/lles\~nm/mad\~adj = good". Repeat this for all 28 words.
__Step 10:__ Then go to the end of the file and run "r! a2". This will output the following lines as shown below:
```
 `ffeil=gwersxxx
 `gwers=Welsh Lesson xxxb - Beginner-2 Dechreuwr
 `teitl=Vocab Stanza xxx/Reading Vocab
 `1) 'th =  your~pron
 `2) 'w =  her~possprn
 `3) brawd =  brother~nm
 `4) chwiorydd =  sister~nm
 `5) dydd =  morning~nm
 `6) ei_un_ef =  his~adv
 `7) gwela_di =  see_you~phrs
 `8) hapus =  happy~adj
 `9) heddiw =  today~adv
 `10) hen =  old~adj
 `11) henw =  name~nm
 `12) hi =  she~pron
 `13) hwyl =  bye~phrs
 `14) hwyrach =  later~adj
 `15) mad =  good~adj
 `16) mam =  mother~nm
 `17) mi =  i~pron
 `18) o =  he~pron
 `19) pwy =  who~pron
 `20) py =  what~adj
 `21) sut =  how~adv
 `22) tadogi =  father~vbinf
 `23) trwm =  sad~adj
 `24) ydwyf =  am~vbinf
 `25) ydych =  are_you~vbinf
 `26) ym =  my~pron
 `27) yna =  then~conj
 `28) yw =  is~vbinf
 `nodwch=1)
 `nodwch=2)
 `nodwch=3)
 `maintcy=135
 `llun1=grammadeg1/170/425/45
 `llun2=cenhinen/80/503/390
 `llun3=gwacter/1/3/7
 `llun4=gwacter/80/495/325
 `===========
```
__Step 11:__ Amend the output filename accordingly from gwersxxx to something else. 
__Step 12:__ Then manually replace the English words with the Welsh words that you selected earlier in step 9. Make sure to add an output filename, e.g. gwers001c. Your text should now look like the text below. Note that the letters t, and h were used in front of letters in square brackets to indicate mutations from the unmutated forms in the vocab. These letters are m (soft), t (nasal), a (breathed), h (h-prefix), d (none), and c (mixed). Note also that multi-word terms when not hyphenated are joined by underscores in the English and the Welsh:
```
 |=================
 |ffeil=gwers001c
 |Boreu` da`!
 |Sut` wyt_ti`?
 |Beth` yw` dy` enw`?
 |Sut` wyt_ti` heddiw`?
 |Are_you` happy` or sad`?
 |Fy` enw` yw` Peter.
 |Fi'n` hapus` heddiw`.
 |Pwy` yw` ef`? Ef` yw` fy` t[nh]ad`.
 |Beth` yw` ei` enw`? Ei` enw` yw` Jonathan.
 |Pwy` yw` hi`? Hi` yw` fy` mam`.
 |Beth` yw` ei` h[h]enw`? Ei` h[h]enw` yw` Margaret.
 |Pwy` yw` ef`? Ef` yw` fy` n[m]rawd`.
 |Beth` yw` ei` enw`? Ei` enw` yw` Mike.
 |Pwy` yw` hi`? Hi` yw` fy` chwaer`.
 |Beth` yw` ei` h[h]enw`? Ei` h[h]enw` yw` Marianne.
 |Wela_di` yn_hwyrach`!
 |Hwyl` te`!
 |=================
```
__Step 13:__ Go to the end of the file and run "!cwrs". This will generate the HTML output files with the filename as specified with the "ffeil=" setting.  \
__Step 14:__ You are now ready to add the next lesson. This is simply a matter of adding the new lesson to the already existing lines in the testun file. Repeat steps 1 to 13 above, making to give each section a unique output filename so that the generated HTML files do not overwrite each other. You will know which new English words to avoid as running "r! a1" will advise you. You will also know which Welsh words you missed. The same command will advise you in Welsh. 
## NOTE:
__1.__ To add notes at any point simply add a new line beginning with ``` "`nodwch="``` or ```"|nodwch="``` into the relevant section followed by the notes, e.g.
```
|nodwch=The C is always pronounced hard like K and never soft like an S.
```
__2.__ To add an empty line simply add ```<br/>&emsp;<br/>``` at the end of the line. The first ```<br/>``` creates the new line. The wide space character ensures that the line actually contains a character. This causes the empty line to be retained when copying and pasting into other formats/platforms. The second ```<br/>``` terminates the empty line, e.g.
```
|Welsh Alphabet: <br/>&emsp;<br/>
```
__3.__ To add a subline underneath a bold line, e.g. Welsh sentence in bold followed by smaller English line in regular font, at the end of the Welsh sentence add a forward-slash (/)  and then on the same line add the English sentence, e.g.
```
|Bore da! / Good morning!
```
__4.__ To add a title, add the setting ```gwers=``` with the title after the equal sign (=), e.g.
```
|gwers=1-2 The Welsh Alphabet
```
__5.__ To add a subtitle, add the setting ```teitl=``` with the subtitle after the equal sign (=), e.g.
```
|teitl=1-2 Yr Egwyddor Cymraeg
```
__6.__ To add a 1-char box for Y/N or T/F answers add "{__}" i.e. doble underscores enclosed in braces.

__7.__ To make a text bold, enclose it in "{* text here *}"

__8.__ To add a blank line append the following to the end of the line: "{/}"

__9.__ To format text to look like a link, enclose it in "{lnk: text here :}"

__10.__ Note that newydd.php (called using 'r! nw <num>') adds output file settings lines starting with '***^a2>' which are then picked up by the 'r! a2' process for the population of the output file settings such as filename, title, etc.

__11.___ The '@??' suffix in the English column of geirfa23.txt allows for the further differentation of entries, e.g. '@sg' as used in 'you@sg' represents you singular instead of the archaic word 'thou'.  In the output file, the 'sg' is added together with the speechpart details following a hyphen. e.g. "di   pron    you@sg" is rendered in the output HTML as "di = you (pron-sg)".

__12.___ From version 0.0.29 onwards in the 'r! a1' stage English words can be specified using the tilde '~' symbol after the word and before the backtick, e.g. work~nm selects only the masculine nouns e.g. gwaith, and work~vbinf selects only the verb infinitives e.g. gweithio
_____________________________
## TO DO LIST:
1. Document use of at sign "@" e.g. in geirfa23.txt "gelli    vbprs   you can@sg"
2. In cwrs1a.php amend so that it handles @ sign as in you@sg when generating the HTML output

