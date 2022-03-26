<template>
    <section class="news">
    <div class="container">
        <!-- {{-- Titolo --}} -->
        <div class="news-title">
            Novità dalla nostra cucina
        </div>

        <!-- {{-- Riga superiore --}} -->
        <div class="row">
            <div class="col-6">
                <div class="image top">
                    <img src="https://cdn.agrodolce.it/vnP3wy-Bi2SMpEaXmwshVH8IVPw=/2121x1414/smart/https://www.agrodolce.it/app/uploads/2021/09/istock-1286622470.jpg" alt="">
                </div>
            </div>
            <div class="col-6 text">
                <div class="">
                    <div class="title">
                        Deliveboo for Work
                    </div>
                    <div class="description">
                        Clienti o colleghi affamati? Il nostro team Corporate ti può aiutare.
                    </div>
                    <!-- {{-- Button --}} -->
                    <div>
                        <a class="m_button" href="#">
                            Contattaci
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- {{-- Riga ingeriore --}} -->
        <div class="riga d-flex align-items-center">
            <div class="col-6 text">
                <div class="">
                    <div class="title">
                        Hai già la nostra app?
                    </div>
                    <div class="description">
                        Scaricala ora - disponibile su Apple Store e Google Play!
                    </div>
                    <!-- {{-- Button --}} -->
                    <div class="button-area">
                        <!-- {{-- App Store --}} -->
                        <button class="download" href="#">
                            <div class="d-flex align-items-center">
                                <div class="">
                                    <i class="fab fa-apple"></i>
                                </div>
                                <div class="button-text">
                                    <div class="top-text">
                                        Scarica su
                                    </div>
                                    <div class="bottom-text">
                                        App Store
                                    </div>
                                </div>
                            </div>
                        </button>

                        <!-- {{-- Google Play --}} -->
                        <button class="download" href="#">
                            <div class="d-flex align-item-center">
                                <div class="">
                                    <i class="fab fa-google-play"></i>
                                </div>
                                <div class=" button-text">
                                    <div class="top-text text-uppercase">
                                        Disponibile su
                                    </div>
                                    <div class="bottom-text">
                                        Google Play
                                    </div>
                                </div>
                            </div>
                        </button>
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="image bottom">
                    <img src="https://is5-ssl.mzstatic.com/image/thumb/Purple116/v4/0a/44/29/0a442918-ac0a-1c11-c4a5-0ecf1348bda4/Production-1x_U007emarketing-0-7-0-85-220.png/1200x630wa.png" alt="">
                </div>
            </div>
        </div>
    </div>
</section>
</template>

<script>
    export default {
        name: 'News'
    }
</script>

<style lang="scss" scoped>
@import '../../sass/partials/_variables.scss';

.news{
    background-color: #f9fafa;

    .news-title{
        color: $secondary_color;
        font-size: $components_title;
        font-weight: 600;
        font-style: italic;
    }

    .riga{
        width: 100%;

        .image{
            // width: 100%;
            // height: 100%;
            // background-repeat: no-repeat;
            // background-size: contain;
            border: 1px solid black;

            img{
                width: 100%;
                height: 100%;
            }
        }

        // .top{
        //     background-image: url('https://cdn.agrodolce.it/vnP3wy-Bi2SMpEaXmwshVH8IVPw=/2121x1414/smart/https://www.agrodolce.it/app/uploads/2021/09/istock-1286622470.jpg');
        // }

        // .bottom{
        //     background-image: url('https://is5-ssl.mzstatic.com/image/thumb/Purple116/v4/0a/44/29/0a442918-ac0a-1c11-c4a5-0ecf1348bda4/Production-1x_U007emarketing-0-7-0-85-220.png/1200x630wa.png');
        // }

        .text{
            background-color: red;
            color: $secondary_color;

            .title{
                font-size: 25px;
                font-weight: 600;
                padding-bottom: 15px;
            }

            .description{
                font-size: 16px;
                padding-bottom: 30px;
            }

            .button-area{

                .download{
                    color: white;
                    text-decoration: none;
                    padding: 8px 10px;
                    background-color: black;
                    border: 1px solid lightgray;
                    border-radius: 10px;
                    margin-bottom: 10px;

                    i{
                        color: white;
                        font-size: 35px;
                        margin-right: 10px;
                        // vertical-align: middle;
                    }

                    .button-text{

                        .top-text{
                            font-size: 10px;
                            text-align: left;
                        }

                        .bottom-text{
                            font-size: 15px;
                            text-align: left;
                        }
                    }

                }
            }
        }
    }
}
</style>