<footer class="bg-slate-800">
    <div>
    </div>

    <div class="px-main py-10">
        <div class="max-w-main mx-auto flex items-center mobile-max:flex-col justify-between gap-10 mobile-max:gap-4">
            <div>
                <span class="text-slate-300 text-sm2">&copy; {{ date('Y') }} All Rights Reserved.</span>
            </div>
            <div class="text-emerald-400 font-medium">
                {{ get_option('blogdescription') }}
            </div>
        </div>
    </div>

</footer>
