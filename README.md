<!-- PROJECT LOGO -->
<br />
<div align="center">
  <a href="https://github.com/figuren-theater/ft-platform">
    <img src="https://raw.githubusercontent.com/figuren-theater/logos/main/favicon.png" alt="figuren.theater Logo" width="100" height="100">
  </a>

  <h1 align="center">figuren.theater | Platform</h1>

  <p align="center">
    The master-receipe of the WordPress platform for puppeteers - <a href="https://figuren.theater">figuren.theater</a>.
    <br /><br /><br />
    <a href="https://meta.figuren.theater/blog"><strong>Read our blog</strong></a>
    <br />
    <br />
    <a href="https://figuren.theater">See the network in action</a>
    •
    <a href="https://mein.figuren.theater">Join the network</a>
    •
    <a href="https://websites.fuer.figuren.theater">Create your own network</a>
  </p>
</div>


## Install the figuren.theater platform

1. Clone the repository into a new *htdocs* folder (or choose whatever you prefer)
    ```sh
	git clone https://github.com/figuren-theater/ft-platform.git htdocs
    ```
2. Install via command line
    ```sh
    composer install --no-dev
    composer require figuren-theater/ft-platform-collection
    ```
3. Save the `.env.example` with all needed DB credentials, API keys, etc. as `.env` into the *new docroot*.
4. Create a symlink from `/content/v` to `/vendor` on the production server.

## Structure
- [ft-platform](https://github.com/figuren-theater/ft-platform/)
    - [ft-core](https://github.com/figuren-theater/ft-core/)
        - [WordPress](https://www.wordpress.org/)
    - [ft-platform-collection](https://github.com/figuren-theater/ft-platform-collection/)
        - [ft-admin-ui](https://github.com/figuren-theater/ft-admin-ui)
        - [ft-coresites](https://github.com/figuren-theater/ft-coresites)
        - [ft-data](https://github.com/figuren-theater/ft-data)
        - [ft-interactive](https://github.com/figuren-theater/ft-interactive)
        - [ft-maintenance](https://github.com/figuren-theater/ft-maintenance)
        - [ft-media](https://github.com/figuren-theater/ft-media)
        - [ft-onboarding](https://github.com/figuren-theater/ft-onboarding)
        - [ft-options](https://github.com/figuren-theater/ft-options)
        - [ft-performance](https://github.com/figuren-theater/ft-performance)
        - [ft-privacy](https://github.com/figuren-theater/ft-privacy)
        - [ft-routes](https://github.com/figuren-theater/ft-routes)
        - [ft-security](https://github.com/figuren-theater/ft-security)
        - [ft-seo](https://github.com/figuren-theater/ft-seo)
        - [ft-site-editing](https://github.com/figuren-theater/ft-site-editing)
        - [ft-themes](https://github.com/figuren-theater/ft-themes)
        - [ft-theming](https://github.com/figuren-theater/ft-theming)


## Built with & uses

  - [dependabot](/.github/dependabot.yml)
  - [figuren-theater/code-quality](https://github.com/figuren-theater/code-quality/) - a *required* status check for healthier code and standardized quality on all code changes

## Versioning

We use [Semantic Versioning](http://semver.org/) for versioning. For the versions
available, see the [tags on this repository](/tags).

## Authors

  - **Carsten Bach** - *Provided idea & code* - [figuren.theater/crew](https://figuren.theater/crew/)

See also the list of [contributors](/contributors)
who participated in this project.

## License

This project is licensed under the **GPL-3.0-or-later**, see the [LICENSE](/LICENSE) file for
details

## Acknowledgments

  - [altis](https://github.com/search?q=org%3Ahumanmade+altis) by humanmade, as our digital role model and inspiration
  - [@roborourke](https://github.com/roborourke) for his clear & understandable [coding guidelines](https://docs.altis-dxp.com/guides/code-review/standards/)
  - [python-project-template](https://github.com/rochacbruno/python-project-template) for their nice template->repo renaming workflow
