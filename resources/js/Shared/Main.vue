<template>
<SideBarNav/>
<slot/>
</template>
<script>
import SideBarNav  from './SideBarNav';

export default ({
    components: {
        SideBarNav,
    },
})
</script>
