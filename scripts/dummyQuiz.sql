 
insert into Quiz values("55ab", "Where is Zach's dad?", "dad") ;

insert into Question values(123, "Where is Zach's dad?", "Not here,California,Moncton,Alaska", 1);
insert into Question values(124, "How big are Kyle's biceps? (inches)", "-10,25,32,0", 3);
insert into Question values(125, "How pretty is Anna?(1-10)", "20,110,10,9", 2);
insert into Question values(126, "How long does is take Chris to eat a box of Cheerios?", "10min,20min,20secs,1sec", 4);
insert into Question values(127, "How many girls has Ethan kissed?", "0,1?,1.5,-1", 3);
insert into Question values(128, "How old is Phil?", "123,150,69,-123", 2);
insert into Question values(129, "How beautiful is Ashley?(1-10)", "20,110,10,9", 2);
insert into Question values(130, "How many buses Jacob ridden before?", "55,155,0,-120", 2);
insert into Question values(131, "How many drinks are we having after this term?", "100,110,too many,wayyyyyy too many", 4);
insert into Question values(132, "How awesome is this quiz?", "it's amazing, its mindblowing, really creative, super fun", 1);


insert into QuizQuestions values(111,123,"dad,zach");
insert into QuizQuestions values(111,124,"biceps,gainz");
insert into QuizQuestions values(111,125,"pretty,beautiful");
insert into QuizQuestions values(111,126,"cheerios,food");
insert into QuizQuestions values(111,127,"girls,kiss");
insert into QuizQuestions values(111,128,"phil,age");
insert into QuizQuestions values(111,129,"beautiful,awesome");
insert into QuizQuestions values(111,130,"bus,transportation");
insert into QuizQuestions values(111,131,"drinks,endofterm");
insert into QuizQuestions values(111,132,"quiz,awesome");

insert into Permission values(444, "admin");

insert into Users values(699, "breadstick", "breadstick96", "admin");

insert into QuizResult values (111, 699, "Y", 1001, "Y");