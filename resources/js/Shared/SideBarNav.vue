<template>
  <div class="vertical-menu">
    <div data-simplebar class="sidebar-menu-scroll">
        <div id="sidebar-menu">
            <ul class="metismenu list-unstyled" id="side-menu">
                <li>
                    <Link href="/dashboard">
                        <i class="uil-home-alt"></i>
                        <span>Dashboard</span>
                    </Link>
                </li>
            </ul>
        </div>
    </div>
</div>
</template>
<script>
import { Link } from '@inertiajs/inertia-vue3';

export default ({
   components:{
       Link
    },
})
</script>

