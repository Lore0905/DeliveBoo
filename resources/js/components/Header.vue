<template>
    <header>

        <div class="container">
            <div class="d-flex justify-content-between align-items-center">
                <a class="left" href="/">
                    <i class="fas fa-frog"></i>
                    <span>
                        deliveboo
                    </span>
                </a>
                <div class="right">
                    <div class="m_button_header">
                        <a href="/admin">
                            <i class="fas fa-house-user"></i>
                            <span>
                                Registrati o accedi
                            </span>
                        </a>
                    </div>
                    <div class="m_button_header d-none d-sm-none d-md-block">
                        <a href="#">
                            <i class="fas fa-chevron-down"></i>
                            <span>
                                Collabora con noi
                            </span>
                        </a>
                    </div>

                    <div class="m_button_header d-none d-sm-none d-md-block">
                        <a href="#">
                            <i class="fas fa-bars"></i>
                            <span>
                                Menu
                            </span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </header>
</template>

<script>
export default {
    name: 'Header'
}
</script>

<style lang="scss" scoped>
@import '../../sass/partials/_variables.scss';
@import '../../sass/partials/_generals.scss';

header{
    background-color: $primary_color;
    padding: 20px 0;

    .left{
        color: white;
        font-size: 25px;
        font-weight: 600;
        
    }

    .right{
        display: flex;
        align-items: center;
        
        .m_button_header{
            padding: 0 10px;

            a{
                color: $secondary_color;
                display: inline-block;
                text-decoration: none;
                background-color: white;
                border-radius: 10px;
                padding: 10px 15px;
                border: 1px solid lightgray;
                font-weight: 300;

                &:hover{
                    transform: scale(1.1);
                }

                i{
                    color: $primary_color;
                    padding-right: 5px;
                }
            }
        }
    }
}
</style>