# Changelog

## TO DO LIST
- : to do item 1
- : to do item 2
- : to do item 3

## NOTES

## 0.0.88_251206-1223 - enhancements to dewisiadau1.php - Restructured the folders so that the main modules sit underneath the parent folder on the same level as home and mp3. This allows for individual folders to be set up for different students.
-  Amendments as per the release description

## 0.0.87_251124-0504 - enhancements to dewisiadau1.php and utils classhome.js and yzp5wa1b2c.html - Minor bugfixes to dewisiadau1.php, and addition of Vocabulary Lists links and minor styling improvements to classhome.js and yzp5wa1b2c.html around the display of the link buttons to the Google Docs and essay submission page.
-  Amendments as per the release description

## 0.0.86_251117-0019 - enhancements to dewisiadau1.php and newydd.php - minor corrections of wording in the generated HTML files to make the instructions for the student more helpful and intuitive. Also minor bugfixes in the listing of missing MP3 files in the mp3 folder in the missingmp3.txt output file.
-  Amendments as per the release description

## 0.0.85_251110-0155 - Enhancements to Utils (./home) folder files: classhome.js, send_email.php, yzp5wa1b2c.html, and new file essay_submit.html - These changes relate to 2 changes: 1) In the student exercises homepage, add a new link that opens up essay_submit.html that allows the student to submit essays, and 2) whenever an exercise is completed to record the montha and date e.g. 1110 for 10th of November and to display this on the button on the student's exercises homepage.
-  Amendments as per the release description

## 0.0.84_251102-1704 - Enhancements to dewisiadau1.php and newydd.php - This mainly involves adding new functionality and housekeeping related infrastructure related to the splitstory functionality whereby words that were introduced in an earlier part of the story that is split are replaced by their translated counterparts so that the student avoids having to learn the same words that were already learnt earlier in an earlier module or earlier part of the same split story module. The store of words is written to and read from the JSON file dsaesneg.json which is read into and written from the DSaesneg hash table array into the PHP code. Also underscores appended to new words were introduced in an earlier change so the necessary changes were made to remove these in the splitstory.txt output textfile that is reread into the main text file for processing. Also the new PHP module spltstoryupd.php contains the functionality that prevents the student learning the same words again. But for this the new story segment needs to be parsed from the input file ssuin.txt and outputted to the file ssuout.txt which in turn needs to be rewritten into the main text input file for dws. Therefore dws is the main processing script and ssu is the subscript to preprocess the story segment prior to running it again using dws. Similar to dws, ssu is created in the project folder by newydd.php.
-  Amendments as per the release description

## 0.0.83_251102-0957 - bugfixes in dewisiadau1.php - related to the selection of and rendering of the correct test words in the select options
-  Amendments as per the release description

## 0.0.82_251101-1747 - bugfixes in dewisiadau1.php - related to making tested words unique by appending underscores in PHP and then removing these underscores in the front-end rendering using JavaScript
-  Amendments as per the release description

## 0.0.81_251026-1245 - minor bugfix to utils/send_email.php
-  Amendments as per the release description

## 0.0.80_251025-2358 - bugfix in utils/send_email.php
-  Amendments as per the release description

## 0.0.79_251025-2342 - updates to dewisiadau1.php and utils classhome.js and send_email.php - When completing an exercise instead of updating the student's homepage with a star the speed animal now displays with cheetah for the fastest and squirrel for the slowest
-  Amendments as per the release description

## 0.0.78_251018-2214 - enhancements to dewisiadau1.php - bugfixes
-  Amendments as per the release description

## 0.0.77_251018-1824 - enhancements to dewisiadau1.php, and utils components classhome.js and yzp5wa1b2c.html - 1) list missing mp3 audio clips for words in missingmp3.txt, 2) list missing images for circleimagemob in missinga2i.txt, 3) list previously used vocab words in prevusedwds.txt, and 4) in students' exercise homepage make the module buttons of the same module number, the same colour.
* 251018 - angen cadw rhestr o eiriau dygswyd o'r blaen
* 251018 - angen ar gyfer modiwlau o'r un rhif i fod lliw botwm yr un
* 251018 - cenhedlu rhestr o eiriau Cymraeg diffygiedig oddiwrth y blygell mp3
* 251017 - img_colliedig: 1-4a_Gemini_Generated_Image_o2mwxvo2mwxvo2mw_A.jpg
* 251017 - mp3 colliedig: ymysg, ymysg, ger, tu_flaen_i, islaw, uwchben, ar_gyfer, o_gwmpas, oddi_wrth, dros, at, rhwng, ar_yr_ochr_i, i_lawr, i_fyny, oddeutu, trwy, tu_ôl_i, yn_ystod, o'r_gorau, cyfenw, blynedd, un_deg_naw, hir, byw, ers, deg, hoffi, oed,

## 0.0.76_251016-1837 - enhancements to dewisiadau1.php - for circleimagemob HTML files i.e. those ending 2i.html, as the circle coordinates are now in external JavaScript files in the js subfolder, there is no need to add __.html suffix. These are now .html without the underscores that were initially added to prevent overwriting the coordinates when they were held in the HTML file.
* 251016 - circleimagemob - angen i cysylltu neu fewnforio y ffeil JS allanol ar gyfer y cyfesurynnau o'r cylchoedd
* 251016 - angen i dynnu maes y danricio yn y splitstory

## 0.0.75_251016-1830 - enhancements to dewisiadau1.php - circleimagemob, now uses external JavaScript files to store coordinates of circles, and removal of underscores in splitstory non-selection words, and start of previously-used words check using the hash array DGeiriau.
-  Amendments as per the release description

## 0.0.74_251016-1339 - enhancements to dewisiadau1.php - minor bugfixes in the following areas of functionality: splitstory, circleimagemob, essay format submission and redirection links, etc.
* 251016 - traethawd - ar ôl yr ymroddiad o'r traethawd mae'n angen i ddychwelyd i home/?.html nid home/home/?.html
* 251016 - hollti chwedl - angen i ddiweddaru gyda'r seren ar y dudalen gartref
* 251016 - llun - angen i roi y rhanbarth llefariad yn y dewisiadau
* 251016 - llun - angen i roi y cyfarwyddiad ynno
* 251016 - traethawd - angen i ddefnyddio y gwririo ar gyfer geiriau angenrhediol yn brinach oherwydd y gall hwn lleisteirio y gorchwyl
* 251016 - essay check words issue, need to search only for words with boundaries and leave out words in words

## 0.0.73_251015-2351 - bugfixes to dewisiadau1.php - Original idea was to keep all mp3 files in the mp3 folder, but the audio for Letters of the Alphabet and Dipthongs need to be kept in separate folders need to casing of letters, hence the retention of the mp3_1-h2 and mp3_1-h3 subfolders while all other audio files are in mp3.
* 251015 - splitstory
* 251015 - circleimage

## 0.0.72_251015-2234 - enhancements to dewisiadau1.php - corrections to placements of dvMsg message, and bugfixes
-  Amendments as per the release description

## 0.0.71_251015-2154 - enhancements to dewisiadau1.php - relocate all audio files in mp3 subfolder and all image files in img subfolder
-  Amendments as per the release description

## 0.0.70_251015-2052 - enhancements to dewisiadau1.php - Bugfixes and functionality to help locate correct X and Y positions for circles in circleimagemob()
-  Amendments as per the release description

## 0.0.69_251015-1451 - enhancements in dewisiadau1.php - Tidying up handling of HTML generation logic
-  Amendments as per the release description

## 0.0.68_251015-0821 - Added zipfldr.sh - Shell script utility to back up an existing course folder to a zipfile
-  Amendments as per the release description

## 0.0.67_251015-0805 - enhancements to dewisiadau1.php - Added the functionality putnewtxt() and circleimagemob() to split a vocab story into smaller parts and vocab learning activities. The circleimagemob() function creates an object selection activity from a single image.
-  Amendments as per the release description

## 0.0.66_251014-2256 - enhancements to dewisiadau1.php - Added splitstory_ functionality whereby a long text with new words can be split into multiple vocab learning and building activities using the splitstory_ line inside the module.
-  Amendments as per the release description

## 0.0.65_251011-1933 - minor amendments to dewisiadau1.php - adjustments of spacing for instructions and inclusion of video emoji for video instructions etc.
-  Amendments as per the release description

## 0.0.64_251010-1406 - tidying up code in utils components classhome.js, send_email.php, and yzp5wa1b2c.html
-  Amendments as per the release description

## 0.0.63_251010-1400 - bugfixes to dewisiadau1.php and htmlfmt.php
-  Amendments as per the release description

## 0.0.62_251010-0953 - Enhancements to cyutils.php, dewisiadau1.php, and utils components btnsdesc.js, classhome.js, and yzp5wa1b2c.html - 1) Reverse sorting order of student's exercise homepage buttons so that latest is displayed first, 2) made filepaths relative with the home folder a subfolder of the modules folder instead of hardcoding the domain name
-  Amendments as per the release description

## 0.0.61_251009-1854 - Enhancements to dewisiadau1.php, htmlfmt.php, and utils send_email.php - Added functionality for textbox handling and student essay submission using the txtbx_ tag whereby the underscore is the delimiter e.g. txtbx_100_200_bifurcation|irrigation_desertification|drought-prone where min words is 100, msx words is 200, required words are bifurcation and irrigation and prohibited words are desertification and drought-pron. Also the send_email.php was enhanced to handle the essay submission.
-  Amendments as per the release description

## 0.0.60_251009-0935 - security enhancements to dewisiadau1.php, classhome.js, send_email.php, and user homepage - The u URL parameter and user homepage name have been made more obfuscated to avoid students randomly finding the homepages of other students. The email message with their scores have also been made more concise.
-  Amendments as per the release description

## 0.0.59_251008-1940 - enhancement to dewisiadau1.php - Add titles into activity module pages
-  Amendments as per the release description

## 0.0.58_251008-1744 - additional bugfix to utils/yz.html
-  Amendments as per the release description

## 0.0.57_251008-1740 - Enhancements to dewisiadau1.php, htmlfmt.php, and utils files classhome.css, classhome.js, and yz.html with new file btnsdesc.js generated by dewisiadau1.php - These enhancements enable the btndesc setting in the course file to get collated into btnsdesc.js which then provides the button descriptions for each of the modules in the course on the student's exercise homepage.
-  Amendments as per the release description

## 0.0.56_251008-1254 - enhancement to dewisiadau1.php - generates vocab textfiles with _words.txt suffix for vocab lines starting with |plyssnd_ or |plysnd_
-  Amendments as per the release description

## 0.0.55_251008-1121 - enhancement to dewisiadau1.php - added homepage button on module completion message
-  Amendments as per the release description

## 0.0.54_251008-1108 - enhancement to dewisiadau1.php - added homepage button on the module password input
-  Amendments as per the release description

## 0.0.53_251008-1100 - amended .gitignore and add example student's homepage file utils/yz.html
-  Amendments as per the release description

## 0.0.52_251008-1057 - Enhancements to dewisiadau1.php and Addition of utils folder - the new utils folder contains the files classhome.css, classhome.js, send_email.php, and an example student's homepage yz.html. Buttons on the homepage open to a module in the course. The homepage is located minigwrs/cwrs_<coursename>/home relative to the parent folder minigwrs. The send_email.php is located in cwrs_<coursename>. Whenever a module is completed an email is sent to the teacher's email containing the student's score and timing. The module button on the student's homepage is also updated with a star.
-  Amendments as per the release description

## 0.0.51_251007-1716 - enhancements to dewisiadau1.php
-  Amendments as per the release description

## 0.0.50_251007-0610 - enhancements to dewisiadau1.php and htmlfmt.php - improvements to the UI
-  Amendments as per the release description

## 0.0.49_251006-1714 - further bugfixes for dewisiadau1.php
-  Amendments as per the release description

## 0.0.48_251006-1657 - bugfixes to dewisiadau1.php
-  Amendments as per the release description

## 0.0.47_251006-1622 - enhancements to dewisiadau1.php - Add functionality to handle speech parts for "poss", "nm", and "nf", as well as for generation of _new.txt and _2mod.txt files. In _new.txt the new vocab list is added from the story. In _2mod.txt the same story is used to test the learnt new vocab using the same story as before.
-  Amendments as per the release description

## 0.0.46_251004-2025 - enhancements to dewisiadau1.php - play audio of word, if available, when the students selects the correct answer, otherwise play normal correct sound
-  Amendments as per the release description

## 0.0.45_251004-1651 - enhancements to dewisiadau1.php - bugfixes, and handling of names of files with accents and apostraphes in the sound file name, etc.
-  Amendments as per the release description

## 0.0.44_251003-1928 - enhancements to dewisiadau1.php - Added more emojis to encourage incorrect answers and cheer correct answers
-  Amendments as per the release description

## 0.0.43_251003-1730 - enhancements to dewisiadau1.php - Added automatic correct answer check and hint to correct answer if incorrect
-  Amendments as per the release description

## 0.0.42_251003-1304 - enhancements in dewisiadau1.php and htmlfmt.php - new variables LlNesaf, LlCynModiwl, and LlCynTeitl
-  Amendments as per the release description

## 0.0.41_251001-2255 - added shwpng and shwjpg functionality to dewisiadau1.php to show images within the texts
-  Amendments as per the release description

## 0.0.40_250930-1455 - enhancements to cyutils.php and dewisiadau1.php
-  Amendments as per the release description

## 0.0.39_250929-1155 - enhancements to dewisiadau1.php
-  Amendments as per the release description

## 0.0.38_250929-0914 - amendements to htmlfmt.php, dewisiadau1.php, and newydd.php for new playsound (plysnd), and email (send_email.php) functionalities
-  Amendments as per the release description

## 0.0.37_250928-1045 - enhancements to dewisiadau1.php
-  Amendments as per the release description

## 0.0.36_250927-2020 - enhancements to dewisiadau1.php, htmlfmt.php, and cyutils.php
-  Amendments as per the release description

## 0.0.35_250926-1957 - bugfixes to dewisiadau1.php and htmlfmt.php
-  Amendments as per the release description

## 0.0.34_250926-1004 - amendments and enhancements to dewisiadau1.php
-  Amendments as per the release description

## 0.0.33_250925-1947 - additional amendments to dewisiadau1.txt and CHANGELOG.md
-  Amendments as per the release description

## 0.0.32_250925-1841 - added new utility dewisiadau1.php for the generation of html pages with selection option lists for homework
- This is the 'homework' generator. For lines beginning with "|" and Welsh words suffixed with backtick (`) followed by the word type, which is 1 of the following 12: it (initiator), rs (response), iv (infinitive), nu (noun), ex (excalamation), pn (pronoun), ix (inflexion), ct (connector), av (adverb), ps (preposition), id (idiom), or aj (adjective) then it generates a selection list for that word in the HTML. A new word can be specified using the not symbol (¬) followed by the English for the Welsh e.g. "music¬cerddoriaeth". This uses the library at CDN https://cdn.jsdelivr.net/npm/canvas-confetti@1.6.0/dist/confetti.browser.min.js to create a confetti effect when the student selects all the correct options.

## 0.0.31_250916-1119 - amendments to README.md
-  Amendments as per the release description

## 0.0.30_250916-1116 - additions to README.md
-  Amendments as per the release description

## 0.0.29_250916-1112 - changes to amdrin1.php and amdrin2.php to allow specification of speechpart e.g. work~vbinf, changes to newydd.php to allow easy copy of project folders 'cwrs_', and additions to geirfa23.txt
-  Amendments as per the release description

## 0.0.28_250915-2042 - changes to geirfa23.txt and newydd.php
-  Amendments as per the release description

## 0.0.27_250909-2048 - changes to amdrin2.php and htmlfmt.php
-  Amendments as per the release description

## 0.0.26_250907-2040 - additional amendments to README.md, amdrin2.php, cwrs1a.php, geirfa23.txt, htmlfmt.php, and newydd.php
-  Amendments as per the release description

## 0.0.25_250907-1006 - amendments to README.md
-  Amendments as per the release description

## 0.0.24_250907-1002 - further amendments to geirfa23.txt and newydd.php
-  Amendments as per the release description

## 0.0.23_250906-2139 - additional amendments to amdrin1.php geirfa23.txt and newydd.php
-  Amendments as per the release description

## 0.0.22_250904-2219 - further amendments to cfai1.php the input text crs_cfai1/cfai1 and htmlfmt.php
-  Amendments as per the release description

## 0.0.21_250904-1953 - AMENDMENTS to cfai1.php and EXAMPLE folder crs_cfai1 with example input textfile cfai1
-  Amendments as per the release description

## 0.0.20_250904-1921 - AMENDMENTS to cfai1.php
-  Amendments as per the release description

## 0.0.19_250904-1909 - added NEW mjemojis.php and amended cfai1.php
-  Amendments as per the release description

## 0.0.18_250904-1852 - additional changes to cfai1.php
-  Amendments as per the release description

## 0.0.17_250904-1754 - additional enhancements for NEW cfai modules
-  The new modules of cfai1.php and cfai_amdrin1.php and cfai_amdrin2.php are an attempt to develop an immersive course where the language of instruction is purely in the language taught.
- cfai1.php: This generates texts where the student is required to select from a list of words for blanks in the sentence. These words are marked by the back-tick. Lines that begin with the not symbol (¬) are processed where the correct words are displayed with no blanks. Lines that begin with the backtick (`) are processed where the blanks are displayed with the answers listed below. but the first letter of each word is provided as a clue. Lines that begin with the pipe symbol (|) are processed whereby the blanks are displayed without any clues except for the list of selection words below the text.
- cfai_amdrin1.php and cfai_amdrin2.php: These are the immersive course equivalents to geiriau23.txt. However instead of looking up the Welsh entries for English words, these lookup the emoji entries for Welsh words using the vocab list in geirfaemj.txt.
- Note: cfai1.php works similar to cwrs.php in that it iterates through all the modules in the single cwrs file e.g. testun for cwrs_testun. However, it uses the line "|-----------" with hyphens as the demarcator between each unit.

## 0.0.16_250830-2132 - additional changes to cwrs1a.php and newydd.php to help immersion learning
-  Amendments as per the release description

## 0.0.15_250830-1346 - amendments to create and save different courses in their own individual subfolders instead of them all sharing the same parent folder
-  Amendments as per the release description

## 0.0.14_250829-1552 - amendments to README.md, amdrin2.php, and geirfa23.txt
-  Amendments as per the release description

## 0.0.13_250828-1858 - new files nw and newydd.php and amendments to README.md, gitignore, and cwrs1a.php
-  Amendments as per the release description

## 0.0.12_250827-1307 - amendments to README.md and cwrs1a.php
-  Amendments as per the release description

## 0.0.11_250826-0943 - amendments to gitignore, README.md, cwrs1a.php, and new file cwrs1
-  Amendments as per the release description

## 0.0.10_250824-1540 - additional changes to cwrs1a.php, and geirfa23.txt
-  Amendments as per the release description

## 0.0.9_250823-2231 - additional changes to README.md, cwrs1a.php, and geirfa23.txt
-  Amendments as per the release description

## 0.0.8_250823-1333 - amendments to README.md, cwrs1a.php, and geirfa23.txt
-  Amendments as per the release description

## 0.0.7_250822-2053 - additional changes to cwrs1a.php, gitignore, and testun
-  Amendments as per the release description

## 0.0.6_250822-1314 - added geirfa23.txt
-  Amendments as per the release description

## 0.0.5_250822-1310 - changes to cwrs1a.php
-  Amendments as per the release description

## 0.0.4_250822-1306 - changes to READNE.md
-  Amendments as per the release description

## 0.0.3_250822-1301 - added a1, a2, cwrs, and testun and updated README.md with English usage details
-  Amendments as per the release description

## 0.0.2_250816-1148 - additional changes
-  Amendments as per the release description

## 0.0.1_250816-1131 - Initial version
- a: initial comment
