# Call only from
# /System/Library/Frameworks/JavaVM.framework/Versions/CurrentJDK/Commands/java -d32 -Dpython.path=Lib/ -jar /Applications/Sikuli-IDE.app/Contents/Resources/Java/sikuli-ide.jar -r /Volumes/www/magictree/ZTesting/magictree/seven/ie/moe/display/main.sikuli --args "http://tree.dtravel/" "http://pma.dtravel/" > /Volumes/www/magictree/ZTesting/magictree/seven/ie/moe/display/main.log
import sys

path=getBundlePath()
setBundlePath(path)

click("1361280700448.png")


click("1361271609370.png")

click(Pattern("1352190346691.png").targetOffset(18,1))

#Choose english language by default
click(Pattern("PH.png").similar(0.60).targetOffset(-12,-2))
click("EN.png")


type(sys.argv[1])
type(Key.ENTER)

click("1361281377771.png")

wait(Pattern("Hrefox.png").similar(0.46),20)
#Choose english language by default
click(Pattern("PH.png").similar(0.60).targetOffset(-12,-2))
click("EN.png")

wait("1361281715385.png",10)


click(Pattern("1361281626705.png").similar(0.90).targetOffset(-18,0))


type(sys.argv[2])
type(Key.ENTER)

wait("Connexion.png",10)
click("UIIIISGIGUT.png")
type('root')
click(Pattern("Motdepasse-1.png").targetOffset(114,-2))
type('demo')
click("Excuter.png")
click("magnctree.png")
wait("pzSQL4Reehct.png",5)
click("pzSQL4Reehct.png")


click(Pattern("Excuterune0u.png").similar(0.85).targetOffset(-2,29))


type('SELECT MT.title,ROUND( RAND( ) *100000) RANDOM FROM mt_demo_caption MT WHERE 1 = 1 AND language = "ENG" ORDER BY RANDOM')
click("Excuter-1.png")
doubleClick(Pattern("title.png").targetOffset(-9,19))
# Copy label found to clipboard
type("a",KeyModifier.CTRL)
type("c",KeyModifier.CTRL)

click("9.png")

#Choose english language by default
#click(Pattern("PH.png").similar(0.65).targetOffset(-12,-2))
#click(Pattern("EN.png").similar(0.64))

# Start global control view
# English mode
click(Pattern("RIQIQ1Defaul.png").similar(0.81).targetOffset(164,2))
wait("Expandall.png",5)
click(Pattern("vlode1llE.png").similar(0.81))
wait("Refresh.png",5)
click(Pattern("mana.png").similar(0.95))
wait("Collapseall.png",5)
click(Pattern("Rum2Mode1.png").similar(0.91).targetOffset(126,0))

wait("llLaunchsear.png",5)
click(Pattern("ode1Cku.png").similar(0.92))

type("v",KeyModifier.CTRL)
type(Key.ENTER)
wait("1ilernsconla.png",20)

doubleClick(Pattern("l1.png").targetOffset(-58,-3))

type("a",KeyModifier.CTRL)
type(Key.BACKSPACE)

type(Key.ENTER)
wait("IEIQN0inpuLc.png",5)

click(Pattern("VMEIEN0inpui.png").similar(0.92).targetOffset(-79,2))
type("v",KeyModifier.CTRL)
click(Pattern("1361283668216.png").targetOffset(-33,0))



print "Script successfully ended"
