About each files
===

# Usage

All submodule repository change.

```sh
sh ./asset/git/submodule/github.sh [Your GitHub account name]
git submodule sync
```

# Other files

```
local.sh  | Change to local repository.
repo.sh   | Change to remote repository.
github.sh | Change to GitHub user name.
rename.sh | Remote name change. origin --> upstream
```

# rename.sh

 Change remote name.

```sh
sh rename.sh origin upstream
```

# github.sh

 Change github user name.

```sh
sh github.sh my_github_user_name
```

# local.sh

 Change to local repository from git.

```sh
sh local.sh
```

# repo.sh

 Change to private server repository from git.

```sh
sh repo.sh
```
