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
        <p v-if="nextBdD == 0">Ti sei scordato il tuo compleanno??? Auguri!!!</p>
        <p v-else>Il per il tuo prossimo compleanno mancano {{nextBdD}} giorni</p>
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
                        let next_birthday = new Date(birthdate);
                        // check if this year's birthdate has arleady been celebrated
                        if(today.getMonth() > birthdate.getMonth()) {
                            next_birthday.setFullYear(today.getFullYear() + 1);
                        } else if(today.getMonth() < birthdate.getMonth()) {
                            next_birthday.setFullYear(today.getFullYear());
                        } 
                        // happy birthday case
                        else {
                            this.nextBdD = 0;
                            return 0;
                        }
                        let remaining_days = next_birthday.getTime() - today.getTime();
                        remaining_days = Math.floor(remaining_days / (1000 * 3600 * 24));
                        this.nextBdD = remaining_days;
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