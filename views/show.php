<?php 
    include_once('classes/DB.php');
?>

<!DOCTYPE htm="en">
<hl>
<html langead>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/vue@2.6.14/dist/vue.js"></script>
    <title>Show</title>
</head>
<body>
    <main id="app">
        <p>{{name}}</p>
        <p>Hai {{birth}} anni</p>
        <p>Il per il tuo prossimo compleanno mancano {{nextBdD}} giorni</p>
    </main>
    <script>
        const app = new Vue (
            {
                el:'#app',
                data: {
                    entity: [],
                    name: '',
                    birth: '',
                    nextBdD: '',
                },
                methods: {
                    ageCalc: function() {
                        // get today's date
                        let today = new Date();
                        // get birthdate
                        let birthdate = new Date(this.entity[0].birthdate);
                        // calculate age
                        let age = today.getFullYear() - birthdate.getFullYear();
                        let m = today.getMonth() - birthdate.getMonth();
                        if(m < 0 || (m == 0 && today.getDate() < birthdate.getDate())) {
                            age--;
                        }
                        this.birth = age;
                    },
                    nextBirthday: function() {
                        // get today's date
                        let today = new Date();

                        let birthdate = new Date(this.entity[0].birthdate);
                        // check if this year's birthdate has arleady been celebrated
                        if(today.getMonth() > birthdate.getMonth()) {
                            if(today.getDay() > birthdate.getDay()) {
                                this.nextBdD = birthdate.getDay() - today.getDay();
                            }
                        } else {

                        }
                    }
                },
                mounted: function()   {
                    this.entity = <?php print_r(json_encode(DB::query('SELECT * FROM entities WHERE id = 1'))); ?>;
                    this.name = this.entity[0].name;
                    this.ageCalc();
                    this.nextBirthday();
                }
            }
        )
    </script>
</body>
</html>