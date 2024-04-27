<div>
    <div class="d-flex flex-column align-items-center text-center p-3 py-5">
        <div class="profile-image-wrapper">
            <img class="profile-image" width="150px"
                src="
                @if ($user->profile == null)
            /back/img/user/person.png
            @else
            {{ $user->profile->picture }}
            @endif">
            <input type="file" name="file" id="changeUserProfilePicture" class="d-none"
                onchange="this.dispatchEvent(new InputEvent('input'))">
            <a href="" class="edit-icon  btn btn-sm btn-warning mb-5"
                onclick="event.preventDefault();document.getElementById('changeUserProfilePicture').click()">
                <i class="ti-pencil"></i>
            </a>
        </div>
        <span class="font-weight-bold">{{ $user->name }}</span>
        <span class="text-black-50">{{ $user->email }}</span>
    </div>
</div>
