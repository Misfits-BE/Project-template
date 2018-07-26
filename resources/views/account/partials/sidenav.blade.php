<div class="list-group list-group-transparent mb-0">
    <a href="#" class="list-group-item list-group-item-action disabled">
        <h4 class="align-left mb-0">Account settings</h4>
    </a>

    <a href="{{ route('account.info') }}" class="list-group-item {{ isActiveRoute('account.info') }} list-group-item-action">
        <span class="icon mr-3"><i class="fe fe-user"></i></span>
        Account information
    </a>

    <a href="" class="list-group-item list-group-item-action">
        <span class="icon mr-3"><i class="fe fe-lock"></i></span>
        Account security
    </a>

    <a href="" class="list-group-item list-group-item-action">
        <span class="icon mr-3"><i class="fe fe-x-circle"></i></span> Delete account
    </a>
</div>