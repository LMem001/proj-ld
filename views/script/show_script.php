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
            /* Function ageCalc
            * return void
            */ 
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
            /* Function nextBirthday
            * return void
            */ 
            nextBirthday: function() {
                // get today's date
                let today = new Date();
                // get birthdate
                let birthdate = new Date(this.entity[0].birthdate);

                let next_birthday = new Date(birthdate);

                let m = today.getMonth() - birthdate.getMonth();
                // check if the birthday has arleady been celebrated or not this year
                if(m < 0 || (m == 0 && today.getDate() < birthdate.getDate())) {
                    next_birthday.setFullYear(today.getFullYear());
                } else if(m > 0 || (m == 0 && today.getDate() < birthdate.getDate())) {
                    next_birthday.setFullYear(today.getFullYear() + 1);
                } else if(m == 0 && today.getDate() == birthdate.getDate()) {
                    this.nextBdD = 0;
                    return 0;
                }

                let remaining_days = next_birthday.getTime() - today.getTime();
                remaining_days = Math.floor(remaining_days / (1000 * 3600 * 24));
                this.nextBdD = remaining_days;
            }
        },
        mounted: function()   {
            this.entity = <?php print_r(json_encode(DB::query($query_string))); ?>;
            this.name = this.entity[0].name;
            this.ageCalc();
            this.nextBirthday();
        }
    }
)
</script>
