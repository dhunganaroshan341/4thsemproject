<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#searchForm").submit(function(event) {
                event.preventDefault();
                var searchQuery = $("#search_query").val();

                $.ajax({
                    type: "POST",
                    url: "../search.php",
                    data: { search_query: searchQuery },
                    success: function(response) {
                        $("#searchResults").html(response);
                    }
                });
            });
        });
    </script>