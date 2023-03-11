---
name: Plattform update
about: "[Absolutely internal] issue template to succeed updating the whole figuren.theater
  plattform"
title: Plattform update
labels: ''
assignees: ''

---

```[tasklist]
### branch  `develop` 
- [ ] Documented, added & commited all changes to the repo
- [ ] `git pull`ed all PRs
- [ ] reviewed and merged the pulled PRs
- [ ] updated dependencies with `composer update --no-install -vv`
- [ ] commited all changes to the repo
- [ ] bumped version
- [ ] opened PR on `main` branch
```

```[tasklist]
### branch  `main` 
- [ ] merged `development` PR
- [ ] tagged commit with new version
- [ ] drafted new release
- [ ] `git push && git push --tags`
- [ ] *backup*ed `producton` database
- [ ] **Published release** and automatically deployed to live
```
