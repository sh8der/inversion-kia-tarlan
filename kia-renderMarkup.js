var automate = {
  titles: [],
  videos: [],
  slideTemplate: `[section_inner padding="0px" class="no-padding"]

[ux_banner height="210px" bg="3376" bg_overlay="rgba(5, 20, 31, 0.2)" bg_pos="55% 52%" class="mr-half"]

[text_box position_x="50" position_y="50"]

[video_button video="{{video}}"]

[/text_box]

[/ux_banner]
[gap height="10px"]

<h5 style="text-align: left;">{{title}}</h5>

[/section_inner]`,
  setTitles: function () {
    this.titles = []
    document
      .querySelectorAll(".news-card-content__title")
      .forEach((title) => this.titles.push(title.innerText));
  },
  setVideos: function () {
    this.videos = []
    document
      .querySelectorAll(".videos-gallery__iframe-body iframe")
      .forEach((iframe) =>
        this.videos.push(
          "https://www.youtube.com/watch?v=" +
            iframe.src.split("/embed/")[1].split("?")[0]
        )
      );
  },
  getMarkup: function () {
    var markup = "";
    this.titles.forEach((title, index) => {
      markup = markup.concat(
        this.slideTemplate
          .replace("{{video}}", this.videos[index])
          .replace("{{title}}", title)
      );
    });
    console.log(markup);
  },
};
