<div class="sidebar sidebar-hide-to-small sidebar-shrink sidebar-gestures">
    <div class="nano">
        <div class="nano-content">
            <div class="logo">
                <a href="index.html">
                    <!-- <img src="assets/images/logo.png" alt="" /> -->
                    <span>QuizModule</span>
                </a>
            </div>
            <ul>
                <li class="label">Admin</li>
                <li>
                    <a class="sidebar-sub-toggle">
                        <i class="ti-home"></i> Dashboard
                        <span class="badge badge-primary">2</span>
                        <span class="sidebar-collapse-icon ti-angle-down"></span>
                    </a>
                    <ul>
                        <li>
                            <a href="index.html">Dashboard 1</a>
                        </li>
                        <li>
                            <a href="index1.html">Dashboard 2</a>
                        </li>
                    </ul>
                </li>

                <li class="label">Apps</li>
                <li><a href="{{ route('question.index') }}">  <i class="fa fa-question-circle"></i> Questions</a></li>
                <li><a href="{{ route('answer.index') }}">  <i class="fa fa-comment"></i> Answers</a></li>
               
                <li>
                    <a href="../documentation/index.html">
                        <i class="ti-file"></i> Documentation</a>
                </li>
                <li>
                    <a>
                        <i class="ti-close"></i> Logout</a>
                </li>
            </ul>
        </div>
    </div>
</div>
<!-- /# sidebar -->
