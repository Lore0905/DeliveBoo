<template>
  <div>
        <div class="wrapping-serchbox">
            <div class="container">
                <div class="row">

                    <!-- COL -->
                    <div class="col-6 ">

                        <!-- title -->
                        <h1>I piatti che ami, a domicilio.</h1>

                        <!-- select -->
                        <div class="wrapping-select">
                            <h6>Scegli la tipologia di ristorante che vuoi cercare</h6>

                            <div class="row">
                                <div class="col-6">
                                    <select name="" id="">
                                        <option value="">Risotorante</option>
                                    </select>
                                </div>
                                <div class="col-6">
                                    <button type="button" class="btn btn-primary">Cerca</button>
                                </div>
                            </div>

                        </div>
                    </div>

                    <!-- COL -->
                    <div class="col-6">
                        <img src="https://cwa.roocdn.com/_next/static/media/campaign.df080c2b8ecbb022c066558c655167a1.svg" alt="">
                    </div>
                </div>
            </div>
            <!-- background
            <div id="background-wave">
                <svg width="100%" height="100%" id="svg" viewBox="0 0 1440 600" xmlns="http://www.w3.org/2000/svg" class="transition duration-300 ease-in-out delay-150"><path d="M 0,600 C 0,600 0,300 0,300 C 163.06666666666666,271.06666666666666 326.1333333333333,242.13333333333333 483,268 C 639.8666666666667,293.8666666666667 790.5333333333333,374.53333333333336 949,389 C 1107.4666666666667,403.46666666666664 1273.7333333333333,351.73333333333335 1440,300 C 1440,300 1440,600 1440,600 Z" stroke="none" stroke-width="0" fill="#d0eb99ff" class="transition-all duration-300 ease-in-out delay-150 path-0"></path></svg>
            </div> -->
        </div>
        
  </div>
</template>

<script>
export default {
    name: "Serchbox"
}
</script>

<style lang="scss">
@import '../../sass/partials/_variables.scss';
.wrapping-serchbox{
    background-color: $primary_color;
    min-width: 100%;
    height: 50vh;
    overflow: hidden;
    position: relative;
    padding: 50px 0px;
    
    .container{
        
        .row{
            .col-6{
                // title
                h1{
                    color: black;
                }
                // select
                .wrapping-select{
                    background-color: white;
                    padding: 20px 50px;
                    border-radius: 10px;
                    text-align: center;
                    z-index: 100;
                    
                    h6{
                        text-align: left;
                    }
                    select{
                        width: 80%;
                        border-radius: 5px;
                        
                    }
                }
            }
        }
    }

    // #background-wave{
    //     position: absolute;
    //     bottom: 0px;
    //     width: 100%;
    //     height: 100%;
    // }
}


</style>